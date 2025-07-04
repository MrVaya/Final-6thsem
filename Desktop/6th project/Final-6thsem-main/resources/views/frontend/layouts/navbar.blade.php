<header style="background: #fff; border-bottom: 1px solid #eee; min-height: 56px;">
  <div class="container-fluid d-flex align-items-center justify-content-between py-2">
    <!-- Logo -->
    <div class="d-flex align-items-center" style="min-width:80px;">
      <a href="/" class="text-decoration-none">
        <span style="font-family: 'Poppins', 'Nunito', 'Inter', sans-serif; font-size:2rem; font-weight:700; color:#111; letter-spacing:2px;">FUTBOOK</span>
      </a>
    </div>
    <!-- Nav Items -->
    <nav class="flex-grow-1 d-flex justify-content-center">
      <ul class="d-flex mb-0 list-unstyled align-items-center gap-4" style="font-family:'Poppins','Nunito','Inter',sans-serif; font-size:1.08rem; font-weight:500;">
        <li><a href="http://localhost:8000/venues" class="text-dark text-decoration-none">Venues</a></li>
        <li><a href="http://localhost:8000/tournaments" class="text-dark text-decoration-none">Tournaments</a></li>
        <li><a href="http://localhost:8000/about" class="text-dark text-decoration-none">About</a></li>
        <li><a href="http://localhost:8000/contact" class="text-dark text-decoration-none">Contact</a></li>
      </ul>
    </nav>
    <!-- Right Side: Login/Signup/Profile -->
    <div class="d-flex align-items-center ms-auto gap-3" style="min-width:120px;">
      @guest
      <ul class="d-flex align-items-center mb-0 gap-2" style="list-style:none;">
        <li><a href="http://localhost:8000/login" class="text-dark text-decoration-none">Login</a></li>
        <li><a href="http://localhost:8000/register" class="text-dark text-decoration-none">Sign Up</a></li>
      </ul>
      @endguest
      <!-- Profile Icon/User -->
      @auth
        <a href="{{ route('profile.show') }}" class="text-dark d-flex align-items-center text-decoration-none">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="8" r="4"/><path d="M2 18c0-2.2 3.6-4 8-4s8 1.8 8 4"/></svg>
          <span class="ms-1" style="font-size:0.98rem; font-weight:500;">{{ Auth::user()->name }}</span>
        </a>
      @else
        <a href="{{ route('login') }}" class="text-dark text-decoration-none">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="8" r="4"/><path d="M2 18c0-2.2 3.6-4 8-4s8 1.8 8 4"/></svg>
        </a>
      @endauth
    </div>
  </div>
</header>

<!-- Mobile Navigation Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold text-primary" id="offcanvasNavbarLabel">FUTBOOK</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.venues') ? 'active' : '' }}" href="{{ route('frontend.venues') }}">Venues</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.services') ? 'active' : '' }}" href="{{ route('frontend.services') }}">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.gallery') ? 'active' : '' }}" href="{{ route('frontend.gallery') }}">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.faq') ? 'active' : '' }}" href="{{ route('frontend.faq') }}">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.privacy') ? 'active' : '' }}" href="{{ route('frontend.privacy') }}">Privacy Policy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('frontend.terms') ? 'active' : '' }}" href="{{ route('frontend.terms') }}">Terms & Conditions</a>
      </li>
    </ul>
  </div>
</div>