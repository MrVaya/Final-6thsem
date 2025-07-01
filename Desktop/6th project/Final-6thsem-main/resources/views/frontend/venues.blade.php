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
                        <h2 class="display-5 fw-bold mb-3">Premium Futsal Facilities</h2>
                        <p class="lead">Professional courts with modern amenities and perfect playing conditions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Venues Grid -->
    <div class="row g-4">
        @forelse($venues as $venue)
        <div class="col-lg-6 mb-4">
            <div class="venue-card">
                <div class="venue-card-img">
                    <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" alt="{{ $venue->venuename }}">
                </div>
                <div class="venue-card-body">
                    <div>
                        <div class="venue-card-title">{{ $venue->venuename }}</div>
                        <div class="venue-card-location">{{ $venue->location }}</div>
                        <div class="venue-card-contact">Contact: {{ $venue->contact_person_name }}</div>
                        <div class="venue-card-contact">{{ $venue->phone }}</div>
                    </div>
                    <div class="venue-card-footer">
                        <span class="venue-card-price">$25</span>
                        <button class="venue-card-btn" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
                    </div>
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
@endsection

@push('styles')
<style>
.venue-card {
  display: flex;
  flex-direction: row;
  min-height: 220px;
  border-radius: 20px;
  box-shadow: 0 4px 24px 0 rgba(60,72,88,.08);
  overflow: hidden;
  background: #fff;
  transition: box-shadow 0.2s, transform 0.2s;
}
.venue-card:hover {
  box-shadow: 0 8px 32px 0 rgba(60,72,88,.16);
  transform: translateY(-4px) scale(1.01);
}
.venue-card-img {
  background: #eaf6f3;
  flex: 0 0 38%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 24px 0;
}
.venue-card-img img {
  max-width: 100%;
  max-height: 250px;
  border-radius: 14px;
  box-shadow: 0 2px 8px rgba(60,72,88,.10);
}
.venue-card-body {
  flex: 1 1 62%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 32px 28px 24px 28px;
}
.venue-card-title {
  font-family: 'Satoshi', sans-serif;
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  color: #222;
}
.venue-card-location {
  color: #6c757d;
  font-size: 1rem;
  margin-bottom: 0.5rem;
}
.venue-card-contact {
  color: #888;
  font-size: 0.98rem;
  margin-bottom: 0.25rem;
}
.venue-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 1.5rem;
}



@media (max-width: 991px) {
  .venue-card { flex-direction: column; min-height: unset; }
  .venue-card-img { flex: unset; padding: 18px 0 0 0; justify-content: flex-start; }
  .venue-card-body { padding: 22px 18px 18px 18px; }
}
.venues-main-container {
  max-width: 950px;
  margin: 0 auto;
  padding-left: 5rem;
  padding-right: 5rem;
}
@media (max-width: 991px) {
  .venues-main-container {
    padding-left: 1rem;
    padding-right: 1rem;
  }
}
</style>
@endpush
