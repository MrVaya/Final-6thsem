@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Page Header -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Gallery</h1>
            <p class="lead text-muted">Take a visual tour of our world-class futsal facilities</p>
        </div>
    </div>

    <!-- Gallery Tabs -->
    <div class="row mb-4">
        <div class="col-12">
            <ul class="nav nav-pills justify-content-center mb-4" id="galleryTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="facilities-tab" data-bs-toggle="pill" data-bs-target="#facilities" type="button" role="tab">Facilities</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="courts-tab" data-bs-toggle="pill" data-bs-target="#courts" type="button" role="tab">Courts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="events-tab" data-bs-toggle="pill" data-bs-target="#events" type="button" role="tab">Events</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="action-tab" data-bs-toggle="pill" data-bs-target="#action" type="button" role="tab">Action Shots</button>
                </li>
            </ul>
        </div>
    </div>

    <!-- Gallery Content -->
    <div class="tab-content" id="galleryTabContent">
        <!-- Facilities -->
        <div class="tab-pane fade show active" id="facilities" role="tabpanel">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Main Facility" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Main Facility Entrance</h6>
                            <p class="text-muted small mb-0">Welcome to FUTBOOK's premier location</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Locker Room" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Changing Rooms</h6>
                            <p class="text-muted small mb-0">Clean and spacious facilities for all players</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Reception" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Reception Area</h6>
                            <p class="text-muted small mb-0">Friendly staff ready to assist you</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Spectator Area" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Spectator Seating</h6>
                            <p class="text-muted small mb-0">Comfortable viewing areas for supporters</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Equipment Room" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Equipment Storage</h6>
                            <p class="text-muted small mb-0">Quality gear available for rent</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Parking" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Parking Area</h6>
                            <p class="text-muted small mb-0">Ample parking space available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courts -->
        <div class="tab-pane fade" id="courts" role="tabpanel">
            <div class="row g-4">
                @if($venues->count() > 0)
                    @foreach($venues as $index => $venue)
                    <div class="col-lg-6 col-md-6">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="{{ $venue->venuename }}" style="height: 300px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h5 class="fw-bold text-primary mb-2">{{ $venue->venuename }}</h5>
                                <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $venue->location }}</p>
                                <p class="text-muted small">Professional court with premium surface and lighting</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="badge bg-success">Available</span>
                                    <span class="text-primary fw-bold">$25/hour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" alt="Courts" class="img-fluid mb-3 rounded-4" style="max-width: 400px;">
                        <h4 class="text-primary fw-bold">Our Premium Courts</h4>
                        <p class="text-muted">Multiple professional futsal courts available for booking</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Events -->
        <div class="tab-pane fade" id="events" role="tabpanel">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Tournament" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Annual Championship</h6>
                            <p class="text-muted small mb-0">Our biggest tournament of the year</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Coaching Clinic" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Coaching Clinics</h6>
                            <p class="text-muted small mb-0">Special training sessions with pros</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Corporate Event" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Corporate Events</h6>
                            <p class="text-muted small mb-0">Team building and company tournaments</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Birthday Party" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Birthday Parties</h6>
                            <p class="text-muted small mb-0">Special celebrations for young players</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="League Games" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">League Matches</h6>
                            <p class="text-muted small mb-0">Regular season competitive games</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Awards Ceremony" style="height: 250px; object-fit: cover;">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-primary mb-1">Awards Ceremony</h6>
                            <p class="text-muted small mb-0">Celebrating our champions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Shots -->
        <div class="tab-pane fade" id="action" role="tabpanel">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Action Shot" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="text-muted small mb-0">Intense gameplay moments</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1587384474964-3a06ce1ce699?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NDQ2NDF8MHwxfHNlYXJjaHwzfHxpbmRvb3IlMjBmdXRzYWx8ZW58MHx8fHwxNzUxMzQxOTk2fDA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Skills" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="text-muted small mb-0">Technical skill displays</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521217078329-f8fc1becab68?crop=entropy&cs=srgb&fm=jpg&ixid=M3w3NTY2Nzd8MHwxfHNlYXJjaHwxfHxmdXRzYWwlMjBjb3VydHxlbnwwfHx8fDE3NTEzNDE5ODl8MA&ixlib=rb-4.1.0&q=85" class="card-img-top" alt="Team Play" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="text-muted small mb-0">Team coordination in action</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img src="https://images.pexels.com/photos/6077792/pexels-photo-6077792.jpeg" class="card-img-top" alt="Goal Celebration" style="height: 200px; object-fit: cover;">
                        <div class="card-body p-2">
                            <p class="text-muted small mb-0">Victory celebrations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-primary text-white border-0 rounded-4">
                <div class="card-body text-center py-5">
                    <h3 class="fw-bold mb-3">Experience It Yourself</h3>
                    <p class="lead mb-4">Ready to be part of the action? Book your court today!</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('frontend.venues') }}" class="btn btn-light btn-lg px-4">
                            Book Now
                        </a>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-light btn-lg px-4">
                            Get More Info
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection