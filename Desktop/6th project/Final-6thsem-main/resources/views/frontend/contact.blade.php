@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Contact Us</h1>
            <p class="lead text-muted">Get in touch with us for bookings, inquiries, or support</p>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg width="24" height="24" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <!-- Contact Form -->
        <div class="col-lg-7 mb-5">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Send us a Message</h3>
                    <form method="POST" action="{{ route('frontend.contact.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <select class="form-select @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                                        <option value="">Choose a subject...</option>
                                        <option value="Booking Inquiry" {{ old('subject') == 'Booking Inquiry' ? 'selected' : '' }}>Booking Inquiry</option>
                                        <option value="General Information" {{ old('subject') == 'General Information' ? 'selected' : '' }}>General Information</option>
                                        <option value="Facilities" {{ old('subject') == 'Facilities' ? 'selected' : '' }}>Facilities</option>
                                       
                                        <option value="Tournaments" {{ old('subject') == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                                       
                                        <option value="Complaint" {{ old('subject') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                                        <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Tell us about your inquiry..." required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <svg width="20" height="20" class="me-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-body p-5">
                    <h3 class="fw-bold text-primary mb-4">Get in Touch</h3>
                    <p class="text-muted mb-4">Have questions about our facilities or services? We're here to help!</p>
                    
                    <!-- Contact Methods -->
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <div>
                                <h6 class="fw-bold text-primary mb-1">Our Address</h6>
                                <p class="text-muted mb-0">POKHARA<br>NEPAL</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <div>
                                <h6 class="fw-bold text-primary mb-1">Phone Numbers</h6>
                                <p class="text-muted mb-0">
                                    Main: +977 9846983690<br>
                                    Bookings: +977 985802329<br>
                                  
                                </p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <svg width="24" height="24" class="text-primary" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div>
                                <h6 class="fw-bold text-primary mb-1">Email Addresses</h6>
                                <p class="text-muted mb-0">
                                    Info: info@futbook.com<br>
                                    Bookings: bookings@futbook.com<br>
                                    Support: support@futbook.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="mb-4">
                        <h6 class="fw-bold text-primary mb-3">Business Hours</h6>
                        <div class="row">
                            <div class="col-6">
                                <p class="text-muted small mb-1">Monday - Friday</p>
                                <p class="fw-bold small mb-3">6:00 AM - 11:00 PM</p>
                            </div>
                            <div class="col-6">
                                <p class="text-muted small mb-1">Saturday - Sunday</p>
                                <p class="fw-bold small mb-3">7:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-0">
                    <div class="bg-light d-flex align-items-center justify-content-center rounded-4" style="height: 400px;">
                        <div class="text-center">
                            <svg width="80" height="80" class="text-primary mb-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <h4 class="text-primary fw-bold">Find Us Here</h4>
                            <p class="text-muted">RAM KRISHNA TOLE , POKHARA, NEPAL</p>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
