import requests
import sys
import time
import json
from datetime import datetime, timedelta

class FutsalBookingTester:
    def __init__(self, base_url="http://localhost"):
        self.base_url = base_url
        self.tests_run = 0
        self.tests_passed = 0
        self.csrf_token = None
        self.session = requests.Session()
        self.test_results = []
        
    def run_test(self, name, method, endpoint, expected_status=200, data=None, files=None, headers=None):
        """Run a single API test"""
        url = f"{self.base_url}/{endpoint}" if endpoint else self.base_url
        
        if headers is None:
            headers = {}
            
        if self.csrf_token:
            headers['X-CSRF-TOKEN'] = self.csrf_token
            
        self.tests_run += 1
        print(f"\n🔍 Testing {name}...")
        
        try:
            if method == 'GET':
                response = self.session.get(url, headers=headers)
            elif method == 'POST':
                response = self.session.post(url, data=data, files=files, headers=headers)
            elif method == 'PUT' or method == 'PATCH':
                response = self.session.patch(url, data=data, headers=headers)
            elif method == 'DELETE':
                response = self.session.delete(url, headers=headers)
                
            success = response.status_code == expected_status
            
            result = {
                'name': name,
                'method': method,
                'endpoint': endpoint,
                'expected_status': expected_status,
                'actual_status': response.status_code,
                'success': success,
                'response_size': len(response.text) if response.text else 0
            }
            
            if success:
                self.tests_passed += 1
                print(f"✅ Passed - Status: {response.status_code}")
            else:
                print(f"❌ Failed - Expected {expected_status}, got {response.status_code}")
                print(f"Response: {response.text[:500]}")
                result['error'] = response.text[:500]
                
            self.test_results.append(result)
            return success, response
            
        except Exception as e:
            print(f"❌ Failed - Error: {str(e)}")
            result = {
                'name': name,
                'method': method,
                'endpoint': endpoint,
                'expected_status': expected_status,
                'actual_status': 'ERROR',
                'success': False,
                'error': str(e)
            }
            self.test_results.append(result)
            return False, None
            
    def get_csrf_token(self):
        """Get CSRF token from the page"""
        success, response = self.run_test("Get CSRF Token", "GET", "", 200)
        if success:
            # Extract CSRF token from the response
            import re
            match = re.search(r'<meta name="csrf-token" content="([^"]+)"', response.text)
            if match:
                self.csrf_token = match.group(1)
                print(f"Found CSRF token: {self.csrf_token[:10]}...")
                return True
        return False
        
    def test_admin_bookings(self):
        """Test admin bookings CRUD operations"""
        # List bookings
        success, response = self.run_test("List Bookings", "GET", "admin/bookings", 200)
        if not success:
            return False
            
        # Create booking form
        success, response = self.run_test("Get Booking Create Form", "GET", "admin/bookings/create", 200)
        if not success:
            return False
            
        # Create booking
        tomorrow = (datetime.now() + timedelta(days=1)).strftime('%Y-%m-%d')
        booking_data = {
            'customer_name': 'Test Customer',
            'customer_email': 'test@example.com',
            'customer_phone': '1234567890',
            'venue_id': '1',  # Assuming venue ID 1 exists
            'booking_date': tomorrow,
            'booking_time': '14:00',
            'quantity': '1',
            'total_amount': '100.00',
            'status': 'pending',
            'notes': 'Test booking',
            '_token': self.csrf_token
        }
        
        success, response = self.run_test("Create Booking", "POST", "admin/bookings", 302, data=booking_data)
        if not success:
            return False
            
        # Get the ID of the created booking from the redirect URL
        booking_id = None
        if response.headers.get('Location'):
            if 'bookings' in response.headers.get('Location'):
                print(f"Redirect URL: {response.headers.get('Location')}")
                # Assuming we're redirected to the bookings list
                success, response = self.run_test("View Bookings After Create", "GET", "admin/bookings", 200)
                
        # Edit booking (assuming we have at least one booking)
        success, response = self.run_test("Get Booking Edit Form", "GET", "admin/bookings/1/edit", 200)
        
        # Update booking
        if success:
            booking_data = {
                'customer_name': 'Updated Customer',
                'customer_email': 'updated@example.com',
                'customer_phone': '9876543210',
                'venue_id': '1',
                'booking_date': tomorrow,
                'booking_time': '15:00',
                'quantity': '2',
                'total_amount': '200.00',
                'status': 'confirmed',
                'notes': 'Updated booking',
                '_token': self.csrf_token,
                '_method': 'PATCH'
            }
            
            success, response = self.run_test("Update Booking", "POST", "admin/bookings/1", 302, data=booking_data)
            
        # Delete booking (we'll skip this to avoid removing data)
        # success, response = self.run_test("Delete Booking", "POST", "admin/bookings/1", 302, 
        #                                  data={'_token': self.csrf_token, '_method': 'DELETE'})
        
        return True
        
    def test_admin_venues(self):
        """Test admin venues CRUD operations"""
        # List venues
        success, response = self.run_test("List Venues", "GET", "admin/venues", 200)
        if not success:
            return False
            
        # Create venue form
        success, response = self.run_test("Get Venue Create Form", "GET", "admin/venues/create", 200)
        if not success:
            return False
            
        # Create venue
        venue_data = {
            'venuename': 'Test Venue',
            'location': 'Test Location',
            'phone': '1234567890',
            'contact_person_name': 'Test Contact',
            '_token': self.csrf_token
        }
        
        success, response = self.run_test("Create Venue", "POST", "admin/venues", 302, data=venue_data)
        if not success:
            return False
            
        # Edit venue (assuming we have at least one venue)
        success, response = self.run_test("Get Venue Edit Form", "GET", "admin/venues/1/edit", 200)
        
        # Update venue
        if success:
            venue_data = {
                'venuename': 'Updated Venue',
                'location': 'Updated Location',
                'phone': '9876543210',
                'contact_person_name': 'Updated Contact',
                '_token': self.csrf_token,
                '_method': 'PATCH'
            }
            
            success, response = self.run_test("Update Venue", "POST", "admin/venues/1", 302, data=venue_data)
            
        # Delete venue (we'll skip this to avoid removing data)
        # success, response = self.run_test("Delete Venue", "POST", "admin/venues/1", 302, 
        #                                  data={'_token': self.csrf_token, '_method': 'DELETE'})
        
        return True
        
    def test_admin_products(self):
        """Test admin products CRUD operations"""
        # List products
        success, response = self.run_test("List Products", "GET", "admin/products", 200)
        if not success:
            return False
            
        # Create product form
        success, response = self.run_test("Get Product Create Form", "GET", "admin/products/create", 200)
        if not success:
            return False
            
        # Create product
        product_data = {
            'name': 'Test Product',
            'description': 'Test Description',
            'price': '99.99',
            'stock': '10',
            'category_id': '1',  # Assuming category ID 1 exists
            'is_active': '1',
            '_token': self.csrf_token
        }
        
        success, response = self.run_test("Create Product", "POST", "admin/products", 302, data=product_data)
        if not success:
            return False
            
        # Edit product (assuming we have at least one product)
        success, response = self.run_test("Get Product Edit Form", "GET", "admin/products/1/edit", 200)
        
        # Update product
        if success:
            product_data = {
                'name': 'Updated Product',
                'description': 'Updated Description',
                'price': '199.99',
                'stock': '20',
                'category_id': '1',
                'is_active': '1',
                '_token': self.csrf_token,
                '_method': 'PATCH'
            }
            
            success, response = self.run_test("Update Product", "POST", "admin/products/1", 302, data=product_data)
            
        # Delete product (we'll skip this to avoid removing data)
        # success, response = self.run_test("Delete Product", "POST", "admin/products/1", 302, 
        #                                  data={'_token': self.csrf_token, '_method': 'DELETE'})
        
        return True
        
    def test_admin_tournaments(self):
        """Test admin tournaments CRUD operations"""
        # List tournaments
        success, response = self.run_test("List Tournaments", "GET", "admin/tournaments", 200)
        if not success:
            return False
            
        # Create tournament form
        success, response = self.run_test("Get Tournament Create Form", "GET", "admin/tournaments/create", 200)
        if not success:
            return False
            
        # Create tournament
        tournament_data = {
            'name': 'Test Tournament',
            'slug': 'test-tournament',
            'description': 'Test Description',
            'is_active': '1',
            'sort_order': '1',
            '_token': self.csrf_token
        }
        
        success, response = self.run_test("Create Tournament", "POST", "admin/tournaments", 302, data=tournament_data)
        if not success:
            return False
            
        # Edit tournament (assuming we have at least one tournament)
        success, response = self.run_test("Get Tournament Edit Form", "GET", "admin/tournaments/1/edit", 200)
        
        # Update tournament
        if success:
            tournament_data = {
                'name': 'Updated Tournament',
                'slug': 'updated-tournament',
                'description': 'Updated Description',
                'is_active': '1',
                'sort_order': '2',
                '_token': self.csrf_token,
                '_method': 'PATCH'
            }
            
            success, response = self.run_test("Update Tournament", "POST", "admin/tournaments/1", 302, data=tournament_data)
            
        # Delete tournament (we'll skip this to avoid removing data)
        # success, response = self.run_test("Delete Tournament", "POST", "admin/tournaments/1", 302, 
        #                                  data={'_token': self.csrf_token, '_method': 'DELETE'})
        
        return True
        
    def test_frontend_booking(self):
        """Test frontend booking form submission"""
        # Get the homepage
        success, response = self.run_test("Get Homepage", "GET", "", 200)
        if not success:
            return False
            
        # Submit booking form
        tomorrow = (datetime.now() + timedelta(days=1)).strftime('%Y-%m-%d')
        booking_data = {
            'customer_name': 'Frontend Customer',
            'customer_email': 'frontend@example.com',
            'customer_phone': '1234567890',
            'venue_id': '1',  # Assuming venue ID 1 exists
            'booking_date': tomorrow,
            'booking_time': '16:00',
            'quantity': '1',
            'notes': 'Frontend booking test',
            '_token': self.csrf_token
        }
        
        headers = {
            'X-Requested-With': 'XMLHttpRequest'  # To simulate AJAX request
        }
        
        success, response = self.run_test("Submit Frontend Booking", "POST", "book-now", 200, data=booking_data, headers=headers)
        
        return success

def main():
    # Setup
    tester = FutsalBookingTester()
    
    # Get CSRF token
    if not tester.get_csrf_token():
        print("❌ Failed to get CSRF token, stopping tests")
        return 1
        
    # Run tests
    print("\n=== Testing Admin Bookings ===")
    tester.test_admin_bookings()
    
    print("\n=== Testing Admin Venues ===")
    tester.test_admin_venues()
    
    print("\n=== Testing Admin Products ===")
    tester.test_admin_products()
    
    print("\n=== Testing Admin Tournaments ===")
    tester.test_admin_tournaments()
    
    print("\n=== Testing Frontend Booking ===")
    tester.test_frontend_booking()
    
    # Print results
    print(f"\n📊 Tests passed: {tester.tests_passed}/{tester.tests_run}")
    return 0 if tester.tests_passed == tester.tests_run else 1

if __name__ == "__main__":
    sys.exit(main())