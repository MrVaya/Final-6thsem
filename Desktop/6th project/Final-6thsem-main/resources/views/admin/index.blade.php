@extends('admin.layouts.app')
@section('content')

<body>
 
            <!-- Header -->
            <div class="row">
              <div class="col-12">
                <div class="card bg-primary text-white mb-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <h4 class="text-white mb-1">Welcome to FUTBOOK 🎉</h4>
                        <p class="text-white-50 mb-0">
                          You have {{ $stats['pending_bookings'] }} pending bookings to review today.
                        </p>
                      </div>
                      <div class="text-end">
                        <h2 class="text-white fw-bold">${{ number_format($stats['monthly_revenue'], 2) }}</h2>
                        <small class="text-white-50">This Month's Revenue</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Statistics Cards -->
              <div class="row">
                <div class="col-lg-3 col-md-6 col-6 mb-4">
                  <div class="card">
                  
                
                <div class="col-lg-3 col-md-6 col-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                          <i class="bx bx-calendar-check bx-lg text-warning"></i>
                        </div>
                      @if($stats['pending_bookings'] > 0)
                        <span class="badge bg-label-warning rounded-pill">{{ $stats['pending_bookings'] }} Pending</span>
                      @endif
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Bookings</span>
                    <h3 class="card-title mb-2">{{ $stats['total_bookings'] }}</h3>
                    <small class="text-warning fw-semibold">
                      <a href="{{ route('admin.bookings.index') }}" class="text-decoration-none">View Bookings</a>
                    </small>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-category bx-lg text-info"></i>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Tournaments</span>
                    <h3 class="card-title mb-2">{{ $stats['total_tournaments'] }}</h3>
                    <small class="text-info fw-semibold">
                      <a href="{{ route('admin.tournaments.index') }}" class="text-decoration-none">Manage Tournaments</a>
                    </small>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <i class="bx bx-dollar bx-lg text-success"></i>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Revenue</span>
                    <h3 class="card-title mb-2">${{ number_format($stats['total_revenue'], 0) }}</h3>
                    <small class="text-success fw-semibold">
                      <i class="bx bx-up-arrow-alt"></i> From {{ $stats['confirmed_bookings'] }} completed bookings
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- Recent Bookings -->
              <div class="col-md-6 col-lg-8 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Recent Bookings</h5>
                      <small class="text-muted">Latest booking requests</small>
                    </div>
                    <div class="dropdown">
                      <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                  </div>
                  <div class="card-body">
                    @if($recentBookings->count() > 0)
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
                          <tbody class="table-border-bottom-0">
                            @foreach($recentBookings->take(6) as $booking)
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
                                <span class="fw-semibold">${{ number_format($booking->total_amount, 2) }}</span>
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

              <!-- Quick Actions & Low Stock -->
              <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="row">
                  <!-- Quick Actions -->
                  <div class="col-12 mb-4">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                      </div>
                      <div class="card-body">
                        <div class="d-grid gap-2">
                          <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                            <i class="bx bx-plus me-1"></i> Add Product
                          </a>
                          <a href="{{ route('admin.tournaments.create') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bx bx-category me-1"></i> Add Tournament
                          </a>
                          <a href="{{ route('admin.bookings.create') }}" class="btn btn-outline-success btn-sm">
                            <i class="bx bx-calendar-plus me-1"></i> New Booking
                          </a>
                          <a href="{{ route('admin.hero-sections.create') }}" class="btn btn-outline-info btn-sm">
                            <i class="bx bx-image me-1"></i> Add Hero Section
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Low Stock Alert -->
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title mb-0 text-warning">
                          <i class="bx bx-error-circle me-1"></i> Low Stock Alert
                        </h5>
                      </div>
                      <div class="card-body">
                        @if($lowStockProducts->count() > 0)
                          <ul class="p-0 m-0 list-unstyled">
                            @foreach($lowStockProducts as $product)
                            <li class="d-flex mb-3 pb-1">
                              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                  <h6 class="mb-0 fw-semibold">{{ $product->name }}</h6>
                                  <small class="text-muted">{{ $product->category->name ?? 'No Category' }}</small>
                                </div>
                                <div class="user-progress">
                                  <span class="badge bg-label-danger">{{ $product->stock }} left</span>
                                </div>
                              </div>
                            </li>
                            @endforeach
                          </ul>
                        @else
                          <div class="text-center">
                            <i class="bx bx-check-circle bx-lg text-success"></i>
                            <p class="text-muted mt-2 mb-0">All products are well stocked!</p>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Monthly Trends -->
            <div class="row">
              <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Monthly Booking Trends</h5>
                    <small class="text-muted">Bookings and revenue over the last 6 months</small>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      @foreach($monthlyBookings as $month)
                        <div class="col-md-2 col-4 mb-3 text-center">
                          <div class="border rounded p-3">
                            <h6 class="mb-1">{{ $month['month'] }}</h6>
                            <h4 class="text-primary mb-1">{{ $month['count'] }}</h4>
                            <small class="text-muted">Bookings</small>
                            <div class="mt-2">
                              <small class="text-success fw-semibold">${{ number_format($month['revenue'], 0) }}</small>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- / Content -->
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- / Layout wrapper -->
  </div>

  @endsection