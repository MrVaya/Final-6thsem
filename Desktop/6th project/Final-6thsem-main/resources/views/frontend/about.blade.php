@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">About FutsalPro</h1>
            <p class="lead text-muted">Your premier destination for futsal excellence since 2020</p>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Our Story" style="height: 350px; object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="h-100 d-flex flex-column justify-content-center">
                <h2 class="display-6 fw-bold text-primary mb-4">Our Story</h2>
                <p class="lead mb-4">FutsalPro was founded with a simple mission: to provide the best futsal facilities and experiences for players of all skill levels. We believe that futsal is more than just a sport – it's a passion that brings communities together.</p>
                <p class="text-muted mb-4">Starting with a single court in 2020, we've grown to become the leading futsal facility provider in the region, serving thousands of players annually with our state-of-the-art courts and professional services.</p>
                <div class="d-flex gap-4">
                    <div class="text-center">
                        <h3 class="text-primary fw-bold">50+</h3>
                        <p class="text-muted small">Courts Available</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-primary fw-bold">10,000+</h3>
                        <p class="text-muted small">Happy Players</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-primary fw-bold">4</h3>
                        <p class="text-muted small">Years of Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-center fw-bold text-primary mb-3">Our Mission</h3>
                    <p class="text-muted text-center">To provide world-class futsal facilities and services that inspire players to reach their full potential while fostering a love for the beautiful game.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <svg width="40" height="40" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-center fw-bold text-primary mb-3">Our Vision</h3>
                    <p class="text-muted text-center">To be the leading futsal facility provider, creating vibrant communities where players of all ages and skill levels can enjoy the sport in a safe, professional environment.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Values -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-primary">Our Values</h2>
                <p class="lead text-muted">The principles that guide everything we do</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <svg width="30" height="30" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Excellence</h5>
                    <p class="text-muted small">We strive for the highest standards in everything we do, from our facilities to our customer service.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <svg width="30" height="30" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Innovation</h5>
                    <p class="text-muted small">We continuously improve our facilities and services to provide the best futsal experience possible.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <svg width="30" height="30" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Integrity</h5>
                    <p class="text-muted small">We conduct our business with honesty, transparency, and respect for all our customers and partners.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 text-center">
                <div class="card-body p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <svg width="30" height="30" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.5 7h-5c-.83 0-1.5.67-1.5 1.5v9c0 .83.67 1.5 1.5 1.5h2V22h4zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6C4.67 6 4 6.67 4 7.5S4.67 9 5.5 9 7 8.33 7 7.5 6.33 6 5.5 6zm2.5 16v-6H10.5l-2.54-7.63A1.5 1.5 0 0 0 6.5 7h-5C.67 7 0 7.67 0 8.5v9c0 .83.67 1.5 1.5 1.5H4V22h4z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Community</h5>
                    <p class="text-muted small">We believe in building strong communities through sport and bringing people together through futsal.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold text-primary">Meet Our Team</h2>
                <p class="lead text-muted">The passionate people behind FutsalPro</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <svg width="50" height="50" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">John Martinez</h5>
                    <p class="text-muted mb-2">Founder & CEO</p>
                    <p class="text-muted small">Former professional futsal player with 15 years of experience. John founded FutsalPro to share his passion for the sport.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <svg width="50" height="50" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Sarah Johnson</h5>
                    <p class="text-muted mb-2">Operations Manager</p>
                    <p class="text-muted small">Ensures smooth operations across all facilities. Sarah brings 10 years of sports management experience.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body text-center p-4">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                        <svg width="50" height="50" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <h5 class="fw-bold text-primary mb-2">Mike Rodriguez</h5>
                    <p class="text-muted mb-2">Head Coach</p>
                    <p class="text-muted small">Leads our coaching programs and training sessions. Mike has coached at professional level for 12 years.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary text-white border-0 rounded-4">
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold mb-3">Join the FutsalPro Family</h3>
                    <p class="lead mb-4">Ready to experience the best futsal facilities and community? Get in touch with us today!</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-light btn-lg px-4">
                            Contact Us
                        </a>
                        <a href="{{ route('frontend.venues') }}" class="btn btn-outline-light btn-lg px-4">
                            View Our Venues
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
