@extends('frontend.layouts.app')

@section('content')

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 24 24"><path fill="currentColor" d="M15.12 5.32H17V2.14A26.11 26.11 0 0 0 14.26 2c-2.72 0-4.58 1.66-4.58 4.7v2.62H6.61v3.56h3.07V22h3.68v-9.12h3.06l.46-3.56h-3.52V7.05c0-1.05.28-1.73 1.76-1.73Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 24 24"><path fill="currentColor" d="M22.991 3.95a1 1 0 0 0-1.51-.86a7.48 7.48 0 0 1-1.874.794a5.152 5.152 0 0 0-3.374-1.242a5.232 5.232 0 0 0-5.223 5.063a11.032 11.032 0 0 1-6.814-3.924a1.012 1.012 0 0 0-.857-.365a.999.999 0 0 0-.785.5a5.276 5.276 0 0 0-.242 4.769l-.002.001a1.041 1.041 0 0 0-.496.89a3.042 3.042 0 0 0 .027.439a5.185 5.185 0 0 0 1.568 3.312a.998.998 0 0 0-.066.77a5.204 5.204 0 0 0 2.362 2.922a7.465 7.465 0 0 1-3.59.448A1 1 0 0 0 1.45 19.3a12.942 12.942 0 0 0 7.01 2.061a12.788 12.788 0 0 0 12.465-9.363a12.822 12.822 0 0 0 .535-3.646l-.001-.2a5.77 5.77 0 0 0 1.532-4.202Zm-3.306 3.212a.995.995 0 0 0-.234.702c.01.165.009.331.009.488a10.824 10.824 0 0 1-.454 3.08a10.685 10.685 0 0 1-10.546 7.93a10.938 10.938 0 0 1-2.55-.301a9.48 9.48 0 0 0 2.942-1.564a1 1 0 0 0-.602-1.786a3.208 3.208 0 0 1-2.214-.935q.224-.042.445-.105a1 1 0 0 0-.08-1.943a3.198 3.198 0 0 1-2.25-1.726a5.3 5.3 0 0 0 .545.046a1.02 1.02 0 0 0 .984-.696a1 1 0 0 0-.4-1.137a3.196 3.196 0 0 1-1.425-2.673c0-.066.002-.133.006-.198a13.014 13.014 0 0 0 8.21 3.48a1.02 1.02 0 0 0 .817-.36a1 1 0 0 0 .206-.867a3.157 3.157 0 0 1-.087-.729a3.23 3.23 0 0 1 3.226-3.226a3.184 3.184 0 0 1 2.345 1.02a.993.993 0 0 0 .921.298a9.27 9.27 0 0 0 1.212-.322a6.681 6.681 0 0 1-1.026 1.524Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 24 24"><path fill="currentColor" d="M17.34 5.46a1.2 1.2 0 1 0 1.2 1.2a1.2 1.2 0 0 0-1.2-1.2Zm4.6 2.42a7.59 7.59 0 0 0-.46-2.43a4.94 4.94 0 0 0-1.16-1.77a4.7 4.7 0 0 0-1.77-1.15a7.3 7.3 0 0 0-2.43-.47C15.06 2 14.72 2 12 2s-3.06 0-4.12.06a7.3 7.3 0 0 0-2.43.47a4.78 4.78 0 0 0-1.77 1.15a4.7 4.7 0 0 0-1.15 1.77a7.3 7.3 0 0 0-.47 2.43C2 8.94 2 9.28 2 12s0 3.06.06 4.12a7.3 7.3 0 0 0 .47 2.43a4.7 4.7 0 0 0 1.15 1.77a4.78 4.78 0 0 0 1.77 1.15a7.3 7.3 0 0 0 2.43.47C8.94 22 9.28 22 12 22s3.06 0 4.12-.06a7.3 7.3 0 0 0 2.43-.47a4.7 4.7 0 0 0 1.77-1.15a4.85 4.85 0 0 0 1.16-1.77a7.59 7.59 0 0 0 .46-2.43c0-1.06.06-1.4.06-4.12s0-3.06-.06-4.12ZM20.14 16a5.61 5.61 0 0 1-.34 1.86a3.06 3.06 0 0 1-.75 1.15a3.19 3.19 0 0 1-1.15.75a5.61 5.61 0 0 1-1.86.34c-1 .05-1.37.06-4 .06s-3 0-4-.06a5.73 5.73 0 0 1-1.94-.3a3.27 3.27 0 0 1-1.1-.75a3 3 0 0 1-.74-1.15a5.54 5.54 0 0 1-.4-1.9c0-1-.06-1.37-.06-4s0-3 .06-4a5.54 5.54 0 0 1 .35-1.9A3 3 0 0 1 5 5a3.14 3.14 0 0 1 1.1-.8A5.73 5.73 0 0 1 8 3.86c1 0 1.37-.06 4-.06s3 0 4 .06a5.61 5.61 0 0 1 1.86.34a3.06 3.06 0 0 1 1.19.8a3.06 3.06 0 0 1 .75 1.1a5.61 5.61 0 0 1 .34 1.9c.05 1 .06 1.37.06 4s-.01 3-.06 4ZM12 6.87A5.13 5.13 0 1 0 17.14 12A5.12 5.12 0 0 0 12 6.87Zm0 8.46A3.33 3.33 0 1 1 15.33 12A3.33 3.33 0 0 1 12 15.33Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="menu" viewBox="0 0 24 24"><path fill="currentColor" d="M2 6a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m0 6.032a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1m1 5.033a1 1 0 1 0 0 2h18a1 1 0 0 0 0-2z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24"><path fill="currentColor" d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24"><path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5Z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="futsal" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2zm3.5 6L12 10.5L8.5 8L12 5.5L15.5 8zM8.5 16L12 13.5L15.5 16L12 18.5L8.5 16z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="court" viewBox="0 0 24 24"><path fill="currentColor" d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM11 17H4v-2h7v2zm0-4H4v-2h7v2zm0-4H4V7h7v2zm9 8h-7v-2h7v2zm0-4h-7v-2h7v2zm0-4h-7V7h7v2z"/></symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="trophy" viewBox="0 0 24 24"><path fill="currentColor" d="M7 3V1a1 1 0 0 1 2 0v2h6V1a1 1 0 0 1 2 0v2h1a2 2 0 0 1 2 2v1h1a3 3 0 0 1 3 3v4a3 3 0 0 1-3 3h-1v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-6H3a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3h1V5a2 2 0 0 1 2-2h1zM6 8v12h12V8H6zM4 9a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1V9H4zm16 0v6h1a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-1z"/></symbol>
      </defs>
    </svg>

    <div id="bookingSuccessMsg" class="alert alert-success text-center d-none" role="alert" style="position:fixed;top:20px;left:50%;transform:translateX(-50%);z-index:2000;">
      Booking submitted successfully! We will contact you soon.
    </div>

    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel">Book a Futsal Court</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @auth
            <form id="bookingForm" method="POST" action="{{ route('frontend.booking.store') }}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="customer_name" class="form-label">Your Name *</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="customer_email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="customer_phone" class="form-label">Phone Number *</label>
                    <input type="tel" class="form-control" id="customer_phone" name="customer_phone" required>
                  </div>
                </div>
                <div class="col-md-6">
                
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="venue_id" class="form-label">Select Court *</label>
                    <select class="form-select" id="venue_id" name="venue_id" required>
                      <option value="">Choose a court...</option>
                      @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->venuename }} - {{ $venue->location }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="booking_date" class="form-label">Booking Date *</label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" required min="{{ date('Y-m-d') }}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="booking_time" class="form-label">Booking Time *</label>
                    <select class="form-select" id="booking_time" name="booking_time" required>
                      <option value="">Select time...</option>
                      <option value="08:00">08:00 AM</option>
                      <option value="09:00">09:00 AM</option>
                      <option value="10:00">10:00 AM</option>
                      <option value="11:00">11:00 AM</option>
                      <option value="12:00">12:00 PM</option>
                      <option value="13:00">01:00 PM</option>
                      <option value="14:00">02:00 PM</option>
                      <option value="15:00">03:00 PM</option>
                      <option value="16:00">04:00 PM</option>
                      <option value="17:00">05:00 PM</option>
                      <option value="18:00">06:00 PM</option>
                      <option value="19:00">07:00 PM</option>
                      <option value="20:00">08:00 PM</option>
                      <option value="21:00">09:00 PM</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="quantity" class="form-label">Duration (Hours) *</label>
                    <select class="form-select" id="quantity" name="quantity" required>
                      <option value="1">1 Hour</option>
                      <option value="2">2 Hours</option>
                      
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="notes" class="form-label">Additional Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any special requirements or notes..."></textarea>
              </div>
              <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method *</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                  <option value="khalti">Khalti</option>
                  <option value="cash">Cash on Arrival</option>
                </select>
              </div>
            </form>
            @else
            <div class="text-center py-5">
              <h5 class="mb-4">You must be logged in to book a court.</h5>
              <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
              <a href="{{ route('register') }}" class="btn btn-outline-primary">Sign Up</a>
            </div>
            @endauth
          </div>
          <div class="modal-footer">
            @auth
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" form="bookingForm" class="btn btn-primary">Book Court</button>
            @endauth
          </div>
        </div>
      </div>
    </div>

    <!-- Hero Section  -->
    @if($heroSections->count() > 0)
    @foreach($heroSections as $index => $hero)
    <section style="background-image: url('{{ $hero->background_image ?? "https://images.unsplash.com/photo-1630420598913-44208d36f9af" }}');background-repeat: no-repeat;background-size: cover;background-position: center; min-height: 600px;" class="d-flex align-items-center {{ $index === 0 ? '' : 'd-none' }}">
      <div class="container-lg py-5">
        <div class="row align-items-center">
          <div class="col-lg-6 pt-5 mt-5">
            <h2 class="display-1 ls-1 fw-bold text-primary mb-3" style="font-size:3.5rem;">
              {{ $hero->title }}
            </h2>
            @if($hero->subtitle)
            <p class="fs-4 text-white">{{ $hero->subtitle }}</p>
            @endif
            @if($hero->description)
            <p class="fs-5 text-white">{{ $hero->description }}</p>
            @endif
            <div class="d-flex gap-3 mt-4">
              <button class="btn btn-success btn-lg rounded-pill px-5" data-bs-toggle="modal" data-bs-target="#bookingModal">BOOK NOW</button>
            </div>
          </div>
          <div class="col-lg-6 d-none d-lg-block text-end">
          </div>
        </div>
      </div>
    </section>
    @endforeach
    @endif

    <!-- Three-Column Feature Section -->
    <section class="py-5 bg-white">
      <div class="container-lg">
        <div class="row g-4 text-center">
          <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" style="min-height:800px;">
              <img src="{{ asset('frontend-assets/images/venue.jpeg') }}" class="card-img-top" alt="Venues" style="height:500px; object-fit:cover; width:100%;">
              <div class="card-body">
                <h5 class="card-title fw-bold">Venues</h5>
                <p class="card-text">Explore premium futsal courts in your area and book instantly.</p>
                <a href="{{ route('frontend.venues') }}" class="btn btn-primary rounded-pill px-4">View Venues</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm" style="min-height:800px;">
              <img src="{{ asset('frontend-assets/images/tournament.jpg') }}" class="card-img-top" alt="Tournaments" style="height:500px; object-fit:cover; width:100%;">
              <div class="card-body">
                <h5 class="card-title fw-bold">Tournaments</h5>
                <p class="card-text">Join exciting tournaments and compete with the best teams.</p>
                <a href="{{ route('frontend.tournaments') }}" class="btn btn-primary rounded-pill px-4">View Tournaments</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    <!-- Featured Section with Grid -->
    <section class="py-5 bg-light mb-0" style="margin-bottom:0 !important; padding-bottom:0 !important;">
      <div class="container-lg" style="margin-bottom:0 !important; padding-bottom:0 !important;">
        <div class="row g-4 align-items-stretch" style="margin-bottom:0 !important; padding-bottom:0 !important;">
          <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-lg bg-white">
              <div class="featured-venue-card-img">
                <img src="{{ asset('frontend-assets/images/football.jpg') }}" class="card-img-top" alt="Featured Venue">
              </div>
              <div class="card-body">
                <h4 class="card-title fw-bold">Featured Venue</h4>
                <p class="card-text">{{ $venues->first()->description ?? 'Book our top-rated futsal court for your next match or event.' }}</p>
                <a href="{{ route('frontend.venues') }}" class="btn btn-outline-primary rounded-pill px-4">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row g-3">
              @foreach($venues->skip(1)->take(4) as $venue)
              <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                  <div class="featured-venue-card-img">
                    <img src="{{ $venue->image ? asset('storage/' . $venue->image) : asset('frontend-assets/images/default.jpg') }}"
                         alt="{{ $venue->venuename }}"
                         onerror="this.onerror=null;this.src='{{ asset('frontend-assets/images/default.jpg') }}';">
                  </div>
                  <div class="card-body">
                    <h6 class="card-title fw-bold mb-1">{{ $venue->venuename }}</h6>
                    <p class="card-text small">{{ Str::limit($venue->description, 60) }}</p>
                    <div class="venue-card-footer d-flex align-items-center justify-content-between">
                        <span class="venue-card-price fw-bold text-primary" style="font-size: 1.2rem;">Rs. 1300</span>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal" onclick="selectVenue({{ $venue->id }}, '{{ $venue->venuename }}')">
                            Book Now
                        </button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tournament-->
    @if($tournaments->count() > 0)
    <section class="py-5 overflow-hidden" id="tournaments">
      <div class="container-lg">
        <div class="row g-4 align-items-stretch">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h2 class="fw-bold display-5 mb-3">Tournaments</h2>
            <p class="fs-5 text-muted">Join our exciting futsal tournaments and compete with the best teams in the region. Register now to be part of the action!</p>
          </div>
          <div class="col-lg-6">
            <div class="row g-3">
              @foreach($tournaments->take(4) as $tournament)
              <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                  <img src="{{ $tournament->image ?? asset('frontend-assets/images/tournament.jpg') }}" class="card-img-top" alt="{{ $tournament->name }}" style="height:120px; object-fit:cover;">
                  <div class="card-body">
                    <h6 class="card-title fw-bold mb-1">{{ $tournament->name }}</h6>
                    <a href="#" class="btn btn-success btn-sm rounded-pill px-3 mt-2">View</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- Available Courts -->
    @if($venues->count() > 0)
    <section class="py-5 bg-light" id="venues">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">
            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
              <h2 class="section-title">Available Courts</h2>
              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary rounded-1">View All Courts</a>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              @foreach($venues as $venue)
              <div class="col">
                <div class="venue-card">
                  <div class="venue-card-img">
                    <img src="{{ $venue->image ? asset('storage/' . $venue->image) : asset('frontend-assets/images/default.jpg') }}"
                         alt="{{ $venue->venuename }}"
                         onerror="this.onerror=null;this.src='{{ asset('frontend-assets/images/default.jpg') }}';">
                  </div>
                  <div class="venue-card-body">
                    <h5 class="card-title">{{ $venue->venuename }}</h5>
                    <p class="card-text text-muted">
                      {{ $venue->location }}<br>
                      Contact: {{ $venue->contact_person_name }}<br>
                      {{ $venue->phone }}
                    </p>
                  </div>
                  <div class="venue-card-footer d-flex align-items-center justify-content-between">
                        <span class="venue-card-price fw-bold text-primary" style="font-size: 1.2rem;">Rs. 1300</span>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal" onclick="selectVenue({{ $venue->id }}, '{{ $venue->venuename }}')">
                            Book Now
                        </button>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- Booking CTA  -->
    <section class="py-5 bg-primary text-white">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <h2 class="display-4 mb-4">Ready to Play?</h2>
            <p class="lead mb-4">Book your futsal court now and enjoy the best indoor football experience with professional facilities and equipment.</p>
            <div class="d-flex gap-3 justify-content-center">
              <button class="btn btn-light text-primary btn-lg rounded-pill px-5" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
            
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features  -->
    <section class="py-5">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12 text-center mb-5">
            <h2 class="section-title">Why Choose Our Futsal Center?</h2>
          </div>
        </div>
        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 g-4">
          <div class="col">
            <div class="text-center">
              <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <svg width="40" height="40" class="text-white"><use xlink:href="#trophy"></use></svg>
              </div>
              <h4>Professional Standards</h4>
              <p class="text-muted">Amazing courts with the best facilities and equipment for competitive play.</p>
            </div>
          </div>
          <div class="col">
            <div class="text-center">
              <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                <svg width="40" height="40" class="text-white"><use xlink:href="#calendar"></use></svg>
              </div>
              <h4>Flexible Booking</h4>
              <p class="text-muted">Easy online booking system with flexible time slots to suit your schedule.</p>
            </div>
          </div>
          <div class="col">
            
          </div>
        </div>
      </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      function selectVenue(id, name) {
        const venueSelect = document.getElementById('venue_id');
        venueSelect.value = id;
        var venueNameSpan = document.getElementById('modalVenueName');
        if (venueNameSpan) {
            venueNameSpan.textContent = name;
        }
        // Optionally trigger time update
        updateAvailableTimes();
      }
      window.selectVenue = selectVenue;

      function updateAvailableTimes() {
        const venueId = document.getElementById('venue_id').value;
        const dateInput = document.querySelector('input[name="date"], input[name="booking_date"]');
        const timeSelect = document.querySelector('select[name="time"], select[name="booking_time"]');
        if (!venueId || !dateInput || !timeSelect) return;
        const date = dateInput.value;
        if (!date) return;
        fetch(`/api/booked-times?venue_id=${venueId}&date=${date}`)
          .then(res => res.json())
          .then(data => {
            const booked = data.booked_times || [];
            Array.from(timeSelect.options).forEach(opt => {
              if (booked.includes(opt.value)) {
                opt.disabled = true;
                opt.style.color = '#ccc';
              } else {
                opt.disabled = false;
                opt.style.color = '';
              }
            });
          });
      }

      // Update times when venue or date changes
      document.getElementById('venue_id')?.addEventListener('change', updateAvailableTimes);
      document.querySelector('input[name="date"], input[name="booking_date"]')?.addEventListener('change', updateAvailableTimes);

      // Initial update if modal is opened
      document.getElementById('bookingModal')?.addEventListener('show.bs.modal', updateAvailableTimes);

      // Handle booking form submission
      document.getElementById('bookingForm').addEventListener('submit', function(e) {
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
            // Show temporary success message
            const msg = document.getElementById('bookingSuccessMsg');
            msg.textContent = 'Booking submitted successfully! Redirecting to payment...';
            msg.classList.remove('d-none');
            
            // Hide the booking modal
            bootstrap.Modal.getInstance(document.getElementById('bookingModal')).hide();
            
            // Reset the form
            this.reset();
            
            // Check payment method and redirect accordingly
            const paymentMethod = document.getElementById('payment_method').value;
            if (paymentMethod === 'khalti') {
              // Redirect to Khalti payment
              window.location.href = '/payment/khalti/' + data.booking_id;
            } else {
              // For cash payment, show success message without redirection
              alert('Your booking has been confirmed! You will pay cash on arrival.');
              window.location.href = '/';
            }
          } else {
            alert(data.message || 'There was an error submitting your booking. Please try again.');
          }
        })
        .catch(() => {
          alert('There was an error submitting your booking. Please try again.');
        });
      });
    });
    </script>

    @push('styles')
    <style>
    .venue-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 500px;
        border-radius: 20px;
        box-shadow: 0 4px 24px 0 rgba(60,72,88,.08);
        overflow: hidden;
        background: #fff;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .venue-card-img {
        width: 100%;
        height: 300px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf6f3;
    }
    .venue-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 14px;
        display: block;
    }
    .venue-card-body {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 32px 28px 24px 28px;
    }
    .venue-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.5rem;
        padding: 0 28px 24px 28px;
    }
    .venue-card-price {
        font-size: 1.2rem;
        color: #1a73e8;
        font-weight: bold;
    }
    .venue-card-footer .btn {
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        border-radius: 8px;
    }
    .featured-venue-card-img {
        width: 100%;
        aspect-ratio: 4/3;
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f8f8;
    }
    .featured-venue-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 0;
    }
    </style>
    @endpush

</body>

@endsection