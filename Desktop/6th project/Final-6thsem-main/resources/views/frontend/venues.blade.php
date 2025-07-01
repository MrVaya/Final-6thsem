@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
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
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="{{ $venue->venuename }}" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-success fs-6 px-3 py-2">Available</span>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold text-primary mb-0">{{ $venue->venuename }}</h5>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <svg width="16" height="16" class="text-muted me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span class="text-muted">{{ $venue->location }}</span>
                        </div>
                        
                        <div class="d-flex align-items-center mb-2">
                            <svg width="16" height="16" class="text-muted me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span class="text-muted">{{ $venue->phone }}</span>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <svg width="16" height="16" class="text-muted me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                            <span class="text-muted">Contact: {{ $venue->contact_person_name }}</span>
                        </div>
                    </div>
                    
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg width="14" height="14" class="text-success me-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <small class="text-muted">Air Conditioned</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg width="14" height="14" class="text-success me-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <small class="text-muted">Changing Rooms</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg width="14" height="14" class="text-success me-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <small class="text-muted">Equipment Rental</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <svg width="14" height="14" class="text-success me-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                                </svg>
                                <small class="text-muted">Parking</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h5 text-primary fw-bold">$25</span>
                            <small class="text-muted">/hour</small>
                        </div>
                        <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            Book Now
                        </button>
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
