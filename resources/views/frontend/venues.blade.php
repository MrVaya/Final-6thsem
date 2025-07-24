@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid py-5 venues-main-container">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Our Futsal Venues</h1>
            <p class="lead text-muted">Discover the best futsal courts in your area. Professional facilities for all skill levels.</p>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg position-relative overflow-hidden rounded-4" style="height: 400px;">
                <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Futsal Facility">
                <div class="card-img-overlay d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.5);">
                    <div class="text-center text-white">
                        <h2 class="display-5 fw-bold mb-3">FUTBOOK Facilities</h2>
                        <p class="lead">Professional courts with modern amenities and perfect playing conditions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Venues Grid -->
    <div class="row g-4">
        @forelse($venues as $venue)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
            <div class="venue-card">
                <div class="venue-card-img">
                    <img src="{{ $venue->image ? asset('storage/' . $venue->image) . '?v=' . $venue->updated_at->timestamp : 'https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85' }}" alt="{{ $venue->venuename }}">
                </div>
                <div class="venue-card-title">{{ strtoupper($venue->venuename) }}</div>
                <div class="venue-card-info">{{ strtoupper($venue->location) }}</div>
                <div class="venue-card-info">Contact: {{ strtoupper($venue->contact_person_name) }}</div>
                <div class="venue-card-info">{{ $venue->phone }}</div>
                <div class="venue-card-price">Rs. 1300</div>
                <div class="venue-card-footer">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#bookingModal" onclick="selectVenue({{ $venue->id }}, '{{ $venue->venuename }}')">Book Now</button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" alt="No venues" class="img-fluid mb-3 rounded-4" style="max-width: 400px;">
                <h3 class="text-muted">No venues available at the moment</h3>
                <p class="text-muted">Please check back later or contact us for more information.</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Call to Action Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-primary text-white border-0 rounded-4">
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold mb-3">Ready to Play?</h3>
                    <p class="lead mb-4">Book your futsal court today and enjoy the best facilities in town!</p>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="d-flex gap-3 justify-content-center">
                                <button class="btn btn-light btn-lg px-4" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                    <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 3h-1V1a1 1 0 0 0-2 0v2H8V1a1 1 0 0 0-2 0v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 7h14v2H5V7z"/>
                                    </svg>
                                    Book Now
                                </button>
                                <a href="{{ route('frontend.contact') }}" class="btn btn-outline-light btn-lg px-4">
                                    <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                    </svg>
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('frontend.booking.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookingModalLabel">Book Venue: <span id="modalVenueName"></span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="venue_id" id="venue_id" value="">
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required>
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" name="time" required>
          </div>
          <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select class="form-select" id="payment_method" name="payment_method" required>
              <option value="khalti">Khalti</option>
              <option value="cash">Cash on Arrival</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
function selectVenue(id, name) {
    var venueSelect = document.getElementById('venue_id');
    if (venueSelect) {
        venueSelect.value = id;
    }
    var venueNameSpan = document.getElementById('modalVenueName');
    if (venueNameSpan) {
        venueNameSpan.textContent = name;
    }
}

// Handle booking form submission
document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.querySelector('#bookingModal form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Check payment method and redirect accordingly
                    const paymentMethod = document.getElementById('payment_method').value;
                    if (paymentMethod === 'esewa') {
                        // Redirect to eSewa payment page
                        window.location.href = '/payment/esewa/' + data.booking_id;
                    } else {
                        // For cash payment, show success message without redirection
                        alert('Your booking has been confirmed! You will pay cash on arrival.');
                        window.location.href = '/venues';
                    }
                } else {
                    alert(data.message || 'There was an error submitting your booking. Please try again.');
                }
            })
            .catch(() => {
                alert('There was an error submitting your booking. Please try again.');
            });
        });
    }
});
</script>
@endsection

@push('styles')
<style>
.venue-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px 0 rgba(60,72,88,.08);
    overflow: hidden;
    min-width: 220px;
    max-width: 320px;
    margin: 0 auto;
    padding-bottom: 0;
    transition: box-shadow 0.2s;
}
.venue-card:hover {
    box-shadow: 0 8px 32px 0 rgba(60,72,88,.16);
}
.venue-card-img {
    width: 100%;
    aspect-ratio: 4/3;
    height: 200px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f8f8;
}
.venue-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    border-radius: 0;
}
.venue-card-title {
    font-size: 1.2rem;
    font-weight: 600;
    text-align: center;
    margin: 1rem 0 0.25rem 0;
    color: #222;
    letter-spacing: 1px;
}
.venue-card-info {
    text-align: center;
    color: #888;
    font-size: 0.98rem;
    margin-bottom: 0.25rem;
    line-height: 1.3;
}
.venue-card-price {
    color: #43a047;
    font-size: 1.2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 0.75rem;
}
.venue-card-footer {
    width: 100%;
    padding: 0;
    margin-top: auto;
}
.venue-card-footer .btn {
    width: 100%;
    background: #43a047;
    color: #fff;
    border-radius: 0 0 16px 16px;
    font-weight: 600;
    font-size: 1.05rem;
    padding: 0.7rem 0;
    border: none;
    transition: background 0.2s;
}
.venue-card-footer .btn:hover {
    background: #2e7031;
}
</style>
@endpush
