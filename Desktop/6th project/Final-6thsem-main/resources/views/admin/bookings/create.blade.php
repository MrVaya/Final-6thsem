@extends('admin.layouts.app')
@section('content')

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <div class="layout-page">
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            
            <!-- Header -->
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="card-title mb-0">Add New Booking</h4>
                        <p class="text-muted mb-0">Create a new booking for a customer</p>
                      </div>
                      <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Back to Bookings
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Booking Form -->
            <div class="row">
              <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Booking Information</h5>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.bookings.store') }}" method="POST">
                      @csrf
                      
                      <!-- Customer Information -->
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="customer_name">Customer Name *</label>
                          <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                                 id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                          @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="customer_email">Customer Email *</label>
                          <input type="email" class="form-control @error('customer_email') is-invalid @enderror" 
                                 id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required>
                          @error('customer_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="customer_phone">Customer Phone *</label>
                          <input type="tel" class="form-control @error('customer_phone') is-invalid @enderror" 
                                 id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required>
                          @error('customer_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="status">Status *</label>
                          <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ old('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                          </select>
                          @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Booking Details -->
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="product_id">Product</label>
                          <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id">
                            <option value="">Select Product (Optional)</option>
                            @foreach($products as $product)
                              <option value="{{ $product->id }}" data-price="{{ $product->price }}" 
                                      {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} - NPR {{ number_format($product->price, 2) }}
                              </option>
                            @endforeach
                          </select>
                          @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" for="venue_id">Venue</label>
                          <select class="form-select @error('venue_id') is-invalid @enderror" id="venue_id" name="venue_id">
                            <option value="">Select Venue (Optional)</option>
                            @foreach($venues as $venue)
                              <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
                                {{ $venue->venuename }} - {{ $venue->location }}
                              </option>
                            @endforeach
                          </select>
                          @error('venue_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Date and Time -->
                      <div class="row mb-3">
                        <div class="col-md-4">
                          <label class="form-label" for="booking_date">Booking Date *</label>
                          <input type="date" class="form-control @error('booking_date') is-invalid @enderror" 
                                 id="booking_date" name="booking_date" value="{{ old('booking_date') }}" 
                                 min="{{ date('Y-m-d') }}" required>
                          @error('booking_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="booking_time">Booking Time *</label>
                          <input type="time" class="form-control @error('booking_time') is-invalid @enderror" 
                                 id="booking_time" name="booking_time" value="{{ old('booking_time') }}" required>
                          @error('booking_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" for="quantity">Quantity *</label>
                          <input type="number" class="form-control @error('quantity') is-invalid @enderror" 
                                 id="quantity" name="quantity" value="{{ old('quantity', 1) }}" min="1" required>
                          @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Amount -->
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <label class="form-label" for="total_amount">Total Amount *</label>
                          <div class="input-group">
                            <span class="input-group-text">NPR</span>
                            <input type="number" class="form-control @error('total_amount') is-invalid @enderror" 
                                   id="total_amount" name="total_amount" value="{{ old('total_amount') }}" 
                                   step="0.01" min="0" required>
                          </div>
                          @error('total_amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Notes -->
                      <div class="row mb-3">
                        <div class="col-12">
                          <label class="form-label" for="notes">Customer Notes</label>
                          <textarea class="form-control @error('notes') is-invalid @enderror" 
                                    id="notes" name="notes" rows="3" 
                                    placeholder="Any special requests or notes from customer">{{ old('notes') }}</textarea>
                          @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-12">
                          <label class="form-label" for="admin_notes">Admin Notes</label>
                          <textarea class="form-control @error('admin_notes') is-invalid @enderror" 
                                    id="admin_notes" name="admin_notes" rows="3" 
                                    placeholder="Internal notes for admin use">{{ old('admin_notes') }}</textarea>
                          @error('admin_notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <!-- Submit Buttons -->
                      <div class="row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="bx bx-save me-1"></i> Create Booking
                          </button>
                          <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-x me-1"></i> Cancel
                          </a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Sidebar Info -->
              <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Booking Guidelines</h5>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info">
                      <h6 class="alert-heading mb-2">
                        <i class="bx bx-info-circle me-1"></i> Important Notes
                      </h6>
                      <ul class="mb-0 ps-3">
                        <li>Customer name, email, and phone are required</li>
                        <li>Booking date must be today or in the future</li>
                        <li>Product selection will auto-calculate amount</li>
                        <li>Total amount can be manually adjusted</li>
                        <li>Status can be changed after creation</li>
                      </ul>
                    </div>

                    <div class="border rounded p-3 bg-light mb-4">
                      <h6 class="mb-2">Status Definitions:</h6>
                      <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-label-warning me-2">Pending</span>
                        <small>Awaiting confirmation</small>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-label-success me-2">Confirmed</span>
                        <small>Booking accepted</small>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-label-info me-2">Completed</span>
                        <small>Service delivered</small>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="badge bg-label-danger me-2">Cancelled</span>
                        <small>Booking cancelled</small>
                      </div>
                    </div>

                    <!-- Decorative Illustration to cover empty space -->
                    <div class="text-center mt-4">
                      <img src="https://undraw.co/api/illustrations/booking.svg" alt="Booking Illustration" style="max-width: 220px; width: 100%; margin-bottom: 12px;">
                      <div style="color: #5f6fff; font-size: 15px; font-weight: 500;">Manage your bookings efficiently and grow your business!</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Auto-calculate amount script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const productSelect = document.getElementById('product_id');
      const quantityInput = document.getElementById('quantity');
      const totalAmountInput = document.getElementById('total_amount');

      function calculateTotal() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        const quantity = parseInt(quantityInput.value) || 1;

        if (price) {
          const total = parseFloat(price) * quantity;
          totalAmountInput.value = total.toFixed(2);
        }
      }

      productSelect.addEventListener('change', calculateTotal);
      quantityInput.addEventListener('input', calculateTotal);
    });
  </script>

  <!-- Khalti Checkout integration script -->
  <script src="https://khalti.com/static/khalti-checkout.js"></script>
  <script>
      var khaltiConfig = {
          publicKey: "{{ env('KHALTI_PUBLIC_KEY') }}",
          productIdentity: "COURT123",
          productName: "Court Booking",
          productUrl: "http://localhost",
          eventHandler: {
              onSuccess(payload) {
                  fetch("/verify-khalti-payment", {
                      method: "POST",
                      headers: {
                          "Content-Type": "application/json",
                          "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute("content")
                      },
                      body: JSON.stringify({
                          token: payload.token,
                          amount: payload.amount,
                          court_id: 1 // Replace with actual court ID if needed
                      })
                  })
                  .then(res => res.json())
                  .then(res => {
                      if (res.success) {
                          alert("Payment Successful!");
                          window.location.href = "/admin/bookings";
                      } else {
                          alert("Payment Failed: " + JSON.stringify(res.error));
                      }
                  });
              },
              onError(error) {
                  alert("Something went wrong!");
                  console.log(error);
              }
          }
      };
      var checkout = new KhaltiCheckout(khaltiConfig);
      document.addEventListener('DOMContentLoaded', function() {
          var btn = document.getElementById("bookNowBtn");
          if(btn) {
              btn.onclick = function () {
                  var amount = document.getElementById('total_amount').value || 1000;
                  checkout.show({ amount: parseInt(amount * 100) }); // amount in paisa
              }
          }
      });
  </script>

@endsection