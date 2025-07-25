@extends('admin.layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 py-2">
            
            <!-- Header -->
            <div class="row">
              <div class="col-12">
                <div class="card bg-primary text-white mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="text-white mb-1">Welcome to FUTBOOK🎉</h4>
                        <p class="text-white-50 mb-0">
                          You have {{ $stats['pending_bookings'] ?? 0 }} pending bookings to review today.
                        </p>
                      </div>
                      <div class="text-end">
                        <h2 class="text-white fw-bold">Rs.{{ number_format($stats['monthly_revenue'] ?? 0, 2) }}</h2>
                        <small class="text-white-50">This Month's Revenue</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-3 mb-3">
             
              
              <div class="col-lg-3 col-md-6 col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-calendar-check bx-lg text-warning"></i>
                      </div>
                      @if(($stats['pending_bookings'] ?? 0) > 0)
                        <span class="badge bg-label-warning rounded-pill">{{ $stats['pending_bookings'] }} Pending</span>
                      @endif
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Bookings</span>
                    <h3 class="card-title mb-2">{{ $stats['total_bookings'] ?? 0 }}</h3>
                    <small class="text-warning fw-semibold">
                      <a href="{{ route('admin.bookings.index') }}" class="text-decoration-none">View Bookings</a>
                    </small>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-category bx-lg text-info"></i>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Tournaments</span>
                    <h3 class="card-title mb-2">{{ $stats['total_tournaments'] ?? 0 }}</h3>
                    <small class="text-info fw-semibold">
                      <a href="{{ route('admin.tournaments.index') }}" class="text-decoration-none">Manage Tournaments</a>
                    </small>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-dollar bx-lg text-success"></i>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Revenue</span>
                    <h3 class="card-title mb-2">Rs.{{ number_format($stats['total_revenue'] ?? 0, 0) }}</h3>
                    <small class="text-success fw-semibold">
                      <i class="bx bx-up-arrow-alt"></i> From {{ $stats['confirmed_bookings'] ?? 0 }} completed bookings
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-credit-card bx-lg text-primary"></i>
                      </div>
                      @if(($stats['pending_payments'] ?? 0) > 0)
                        <span class="badge bg-label-warning rounded-pill">{{ $stats['pending_payments'] }} Pending</span>
                      @endif
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Payments</span>
                    <h3 class="card-title mb-2">{{ $stats['total_payments'] ?? 0 }}</h3>
                    <small class="text-primary fw-semibold">
                      <a href="{{ route('admin.payments.index') }}" class="text-decoration-none">View Payments</a>
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Bookings -->
            <div class="row mt-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="card-title mb-0">Recent Bookings</h5>
                      <small class="text-muted">Latest booking requests</small>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                  </div>
                  <div class="card-body">
                    @if(isset($recentBookings) && $recentBookings->count() > 0)
                      <div class="table-responsive">
                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>Customer</th>
                              <th>Product</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($recentBookings->take(5) as $booking)
                            <tr>
                              <td>
                                <div class="d-flex flex-column">
                                  <h6 class="mb-0">{{ $booking->customer_name }}</h6>
                                  <small class="text-muted">{{ $booking->customer_email }}</small>
                                </div>
                              </td>
                              <td>
                                <span class="fw-semibold">{{ $booking->product ? $booking->product->name : 'General Booking' }}</span>
                              </td>
                              <td>
                                <span class="fw-semibold">Rs.{{ number_format($booking->total_amount, 2) }}</span>
                              </td>
                              <td>
                                <span class="badge bg-label-{{ $booking->status_color }}">{{ ucfirst($booking->status) }}</span>
                              </td>
                              <td>{{ $booking->created_at->format('M j, Y') }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    @else
                      <div class="text-center py-4">
                        <i class="bx bx-calendar-x bx-lg text-muted"></i>
                        <p class="text-muted mt-2">No bookings yet</p>
                        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary btn-sm">Add First Booking</a>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                  </div>
                  <div class="card-body">
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                      <a href="{{ route('admin.tournaments.create') }}" class="btn btn-outline-primary">
                        <i class="bx bx-category"></i> Add Tournament
                      </a>
                      <a href="{{ route('admin.bookings.create') }}" class="btn btn-outline-success">
                        <i class="bx bx-calendar-check"></i> New Booking
                      </a>
                      <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-outline-info">
                        <i class="bx bx-image"></i> Add Hero Section
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>

@endsection