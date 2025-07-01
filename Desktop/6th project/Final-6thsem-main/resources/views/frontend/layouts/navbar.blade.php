 <header>
      <div class="container-fluid">
        <div class="row py-3 border-bottom">
          
          <div class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
            <div class="d-flex align-items-center my-3 my-sm-0">
              <a href="{{ route('frontend.home') }}">
                <h3 class="fw-bold text-primary m-0">FutsalPro</h3>
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar">
              <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#menu"></use></svg>
            </button>
          </div>
          
          <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
            <div class="search-bar row bg-light p-2 rounded-4">
              <div class="col-md-4 d-none d-md-block">
                <select class="form-select border-0 bg-transparent">
                  <option>All Equipment</option>
                  <option>Footballs</option>
                  <option>Shoes</option>
                  <option>Apparel</option>
                  <option>Training Gear</option>
                </select>
              </div>
              <div class="col-11 col-md-7">
                <form id="search-form" class="text-center" action="#" method="post">
                  <input type="text" class="form-control border-0 bg-transparent" placeholder="Search courts, equipment, training gear...">
                </form>
              </div>
              <div class="col-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/></svg>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
              <li class="nav-item {{ request()->routeIs('frontend.home') ? 'active' : '' }}">
                <a href="{{ route('frontend.home') }}" class="nav-link">Home</a>
              </li>
              <li class="nav-item {{ request()->routeIs('frontend.venues') ? 'active' : '' }}">
                <a href="{{ route('frontend.venues') }}" class="nav-link">Venues</a>
              </li>
              <li class="nav-item {{ request()->routeIs('frontend.services') ? 'active' : '' }}">
                <a href="{{ route('frontend.services') }}" class="nav-link">Services</a>
              </li>
              <li class="nav-item {{ request()->routeIs('frontend.about') ? 'active' : '' }}">
                <a href="{{ route('frontend.about') }}" class="nav-link">About</a>
              </li>
              <li class="nav-item {{ request()->routeIs('frontend.contact') ? 'active' : '' }}">
                <a href="{{ route('frontend.contact') }}" class="nav-link">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('frontend.gallery') }}">Gallery</a></li>
                  <li><a class="dropdown-item" href="{{ route('frontend.faq') }}">FAQ</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ route('frontend.privacy') }}">Privacy Policy</a></li>
                  <li><a class="dropdown-item" href="{{ route('frontend.terms') }}">Terms & Conditions</a></li>
                </ul>
              </li>
              <!-- Profile Section -->
              <li class="nav-item dropdown">
                @auth
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                      </form>
                    </li>
                  </ul>
                @else
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                  <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                @endauth
              </li>
            </ul>
          </div>
          
          <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
            <ul class="d-flex justify-content-end list-unstyled m-0">
              <li>
                <a href="#" class="p-2 mx-1">
                  <svg width="24" height="24"><use xlink:href="#user"></use></svg>
                </a>
              </li>
              <li>
                <a href="#" class="p-2 mx-1">
                  <svg width="24" height="24"><use xlink:href="#wishlist"></use></svg>
                </a>
              </li>
              <li>
                <a href="#" class="p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                  <svg width="24" height="24"><use xlink:href="#shopping-bag"></use></svg>
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>

      <!-- Mobile Navigation Offcanvas -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title fw-bold text-primary" id="offcanvasNavbarLabel">FutsalPro</h5>
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
    </header>