@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Our Services</h1>
            <p class="lead text-muted">Comprehensive futsal services designed for players of all levels</p>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg position-relative overflow-hidden rounded-4" style="height: 350px;">
                <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Our Services">
                <div class="card-img-overlay d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.6);">
                    <div class="text-center text-white">
                        <h2 class="display-6 fw-bold mb-3">Everything You Need for Futsal</h2>
                        <p class="lead">From court rentals to professional coaching - we've got you covered</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Grid -->
    <div class="row g-4 mb-5">
        <!-- Court Rental -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM11 17H4v-2h7v2zm0-4H4v-2h7v2zm0-4H4V7h7v2zm9 8h-7v-2h7v2zm0-4h-7v-2h7v2zm0-4h-7V7h7v2z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Court Rental</h4>
                    <p class="text-muted mb-4">Premium futsal courts available for hourly rentals. Perfect for casual games, team practice, or tournaments.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Air-conditioned facilities</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Professional court surfaces</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Changing rooms & showers</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Equipment rental available</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Starting at $25/hour</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coaching Programs -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Coaching Programs</h4>
                    <p class="text-muted mb-4">Professional coaching for all skill levels. From beginners to advanced players looking to improve their game.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Certified professional coaches</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Individual & group sessions</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Youth & adult programs</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Skill development focus</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Starting at $40/session</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tournament Organization -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 3V1a1 1 0 0 1 2 0v2h6V1a1 1 0 0 1 2 0v2h1a2 2 0 0 1 2 2v1h1a3 3 0 0 1 3 3v4a3 3 0 0 1-3 3h-1v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6H3a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3h1V5a2 2 0 0 1 2-2h1zM6 8v12h12V8H6zM4 9a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1V9H4zm16 0v6h1a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-1z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Tournament Organization</h4>
                    <p class="text-muted mb-4">Complete tournament management services. We handle everything from registration to awards ceremony.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Full event management</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Registration & scheduling</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Referees & officials</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Trophies & awards</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Custom Pricing</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Equipment Rental -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2zm3.5 6L12 10.5L8.5 8L12 5.5L15.5 8zM8.5 16L12 13.5L15.5 16L12 18.5L8.5 16z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Equipment Rental</h4>
                    <p class="text-muted mb-4">High-quality futsal equipment available for rent. Everything you need for a great game experience.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Professional futsal balls</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Indoor soccer shoes</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Jerseys & bibs</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Goalkeeper gloves</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Starting at $5/item</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Party & Events -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 11H1v2h6v-2zm2.17-3.24L7.05 5.64 5.64 7.05l2.12 2.12 1.41-1.41zM13 1h-2v6h2V1zm5.36 6.05l-1.41-1.41-2.12 2.12 1.41 1.41 2.12-2.12zM17 11v2h6v-2h-6zm-5-2c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm2.83 7.24l2.12 2.12 1.41-1.41-2.12-2.12-1.41 1.41zm-9.19.71l1.41 1.41 2.12-2.12-1.41-1.41-2.12 2.12zM11 23h2v-6h-2v6z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Party & Events</h4>
                    <p class="text-muted mb-4">Host your special events at our facilities. Perfect for birthday parties, corporate events, and celebrations.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Birthday party packages</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Corporate team building</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Private event hosting</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Catering arrangements</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Custom Packages</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance & Facility Management -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                        <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.61 18.99l-9.54-9.54c.83-.84 1.34-2 1.34-3.28C14.41 3.57 11.84 1 8.64 1S2.87 3.57 2.87 6.17c0 1.28.51 2.44 1.34 3.28l-.71.71c-.39.39-.39 1.02 0 1.41l.71.71L1.93 22.4c-.58.58-.16 1.59.66 1.59h15.23c.82 0 1.24-1.01.66-1.59l-2.28-10.12.71-.71c.39-.39.39-1.02 0-1.41l-.71-.71 9.54-9.54c.39-.39.39-1.02 0-1.41s-1.02-.39-1.41 0zM8.64 3c1.74 0 3.17 1.43 3.17 3.17s-1.43 3.17-3.17 3.17-3.17-1.43-3.17-3.17S6.9 3 8.64 3z"/>
                        </svg>
                    </div>
                    <h4 class="fw-bold text-primary mb-3">Facility Management</h4>
                    <p class="text-muted mb-4">Professional facility management services for other sports venues looking to improve their operations.</p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Court maintenance</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Booking system management</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Staff training</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Operations consulting</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="h5 text-primary fw-bold">Contact for Quote</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Venues -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-primary">Our Premium Venues</h2>
                <p class="lead text-muted">State-of-the-art facilities designed for optimal performance</p>
            </div>
        </div>
        @if($venues->count() > 0)
            @foreach($venues->take(3) as $venue)
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="{{ $venue->venuename }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-2">{{ $venue->venuename }}</h5>
                        <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $venue->location }}</p>
                        <p class="text-muted small">Contact: {{ $venue->contact_person_name }}</p>
                        <p class="text-muted small">Phone: {{ $venue->phone }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <p class="text-muted">Venues will be displayed here once available.</p>
            </div>
        @endif
    </div>

    <!-- Call to Action -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary text-white border-0 rounded-4">
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold mb-3">Ready to Get Started?</h3>
                    <p class="lead mb-4">Choose the service that best fits your needs and let's get you on the court!</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('frontend.venues') }}" class="btn btn-light btn-lg px-4">
                            <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3h-1V1a1 1 0 0 0-2 0v2H8V1a1 1 0 0 0-2 0v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 7h14v2H5V7z"/>
                            </svg>
                            Book a Court
                        </a>
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
@endsection