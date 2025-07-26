@extends('admin.layouts.app')
@section('content')

<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  body {
    min-height: 100vh;
    background: #f5f7fa;
  }
  .layout-wrapper {
    min-height: 100vh;
    display: flex;
  }
  .layout-container {
    flex: 1;
    display: flex;
    min-height: 100vh;
  }
  .layout-page {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background: #f5f7fa;
  }
  .content-wrapper {
    flex: 1;
    background: #fff;
    min-height: 100vh;
    box-shadow: 0 0 24px #e9ecef;
    border-radius: 0 0 0 0;
    margin: 0;
  }
  .summary-banner {
    background: #6c63ff;
    color: #fff;
    border-radius: 16px;
    padding: 32px 32px 24px 32px;
    margin-bottom: 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 24px #e9ecef;
  }
  .summary-banner h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 8px;
  }
  .summary-banner .pending {
    font-weight: 600;
    color: #ffe082;
  }
  .summary-banner .revenue {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    text-align: right;
  }
  .summary-cards {
    display: flex;
    gap: 24px;
    margin-bottom: 32px;
    flex-wrap: wrap;
  }
  .summary-card {
    flex: 1 1 220px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px #e9ecef;
    padding: 24px 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    min-width: 200px;
  }
  .summary-card .card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 8px;
  }
  .summary-card .card-value {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 4px;
  }
  .summary-card .card-link {
    color: #6c63ff;
    font-size: 0.95rem;
    text-decoration: underline;
    margin-top: 8px;
  }
  .recent-bookings-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px #e9ecef;
    padding: 24px 20px;
    margin-bottom: 32px;
  }
  .recent-bookings-card h5 {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 8px;
  }
  .recent-bookings-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
  }
  .recent-bookings-table th {
    color: #888;
    font-size: 0.95rem;
    font-weight: 600;
    text-transform: uppercase;
    padding-bottom: 8px;
  }
  .recent-bookings-table td {
    font-size: 1rem;
    background: #f8f9fa;
    border-radius: 6px;
    padding: 10px 8px;
    vertical-align: middle;
  }
  .badge-status {
    background: #ffe082;
    color: #b28704;
    border-radius: 8px;
    padding: 2px 12px;
    font-size: 0.95rem;
    font-weight: 600;
  }
  .container-xxl {
    max-width: 100vw;
    width: 100%;
    padding-left: 32px;
    padding-right: 32px;
  }
  @media (min-width: 1200px) {
    .container-xxl {
      max-width: 100vw;
      width: 100%;
      padding-left: 48px;
      padding-right: 48px;
    }
  }
  @media (max-width: 991px) {
    .summary-cards {
      flex-direction: column;
      gap: 16px;
    }
  }
</style>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <div class="layout-page">
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            
            <!-- Summary Banner -->
            <div class="summary-banner">
              <div>
                <h2>Welcome to FUTBOOK 🎉</h2>
                <div>You have <span class="pending">{{ $bookings->where('status', 'pending')->count() }} pending bookings</span> to review today.</div>
              </div>
              <div class="revenue">
                Rs.{{ number_format($bookings->sum('total_amount'), 2) }}<br>
                <span style="font-size:1rem;font-weight:400;opacity:0.8;">This Month's Revenue</span>
              </div>
            </div>

            <!-- Summary Cards -->
            <div class="summary-cards">
              <div class="summary-card">
                <div class="card-title"><i class="bx bx-calendar"></i> Total Bookings</div>
                <div class="card-value">{{ $bookings->count() }}</div>
                <span class="badge-status">{{ $bookings->where('status', 'pending')->count() }} PENDING</span>
                <a href="{{ route('admin.bookings.index') }}" class="card-link">View Bookings</a>
              </div>
              <div class="summary-card">
                <div class="card-title"><i class="bx bx-grid-alt"></i> Tournaments</div>
                <div class="card-value">3</div>
                <a href="#" class="card-link">Manage Tournaments</a>
              </div>
              <div class="summary-card">
                <div class="card-title"><i class="bx bx-dollar"></i> Total Revenue</div>
                <div class="card-value">Rs.{{ number_format($bookings->sum('total_amount'), 2) }}</div>
                <span style="color:#4caf50;font-size:0.95rem;">↑ From {{ $bookings->where('status','completed')->count() }} completed bookings</span>
              </div>
              <div class="summary-card">
                <div class="card-title"><i class="bx bx-credit-card"></i> Total Payments</div>
                <div class="card-value">4</div>
                <span class="badge-status">4 PENDING</span>
                <a href="#" class="card-link">View Payments</a>
              </div>
            </div>

            <!-- Recent Bookings Card -->
            <div class="recent-bookings-card">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                  <h5>Recent Bookings</h5>
                  <div class="text-muted small">Latest booking requests</div>
                </div>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-primary btn-sm">View All</a>
              </div>
              <div class="table-responsive">
                <table class="recent-bookings-table">
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
                    @foreach($bookings->take(5) as $booking)
                    <tr>
                      <td>
                        <div class="d-flex flex-column">
                          <span class="fw-semibold">{{ $booking->customer_name }}</span>
                          <small class="text-muted">{{ $booking->customer_email }}</small>
                        </div>
                      </td>
                      <td>{{ $booking->product ? $booking->product->name : 'General Booking' }}</td>
                      <td>Rs.{{ number_format($booking->total_amount, 2) }}</td>
                      <td><span class="badge-status">{{ strtoupper($booking->status) }}</span></td>
                      <td>{{ $booking->created_at->format('M j, Y') }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Bookings Table -->
            <div class="card">
              <div class="card-header d-flex flex-column flex-lg-row justify-content-between align-items-lg-center align-items-start gap-3">
                <div>
                  <h5 class="card-title mb-0">All Bookings</h5>
                  <div class="text-muted small mt-1">Total Revenue: <span class="fw-bold text-success">Rs.{{ number_format($bookings->sum('total_amount'), 2) }}</span></div>
                </div>
                <div class="d-flex gap-2">
                  <!-- Filter by Status -->
                  <select class="form-select form-select-sm" id="statusFilter" style="width: auto;">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                  </select>
                </div>
              </div>
              <div class="card-body">
                @if($bookings->count() > 0)
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Customer</th>
                          <th>Product</th>
                          <th>Venue</th>
                          <th>Date & Time</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                          <td>
                            <span class="fw-medium">#{{ $booking->id }}</span>
                          </td>
                          <td>
                            <div class="d-flex flex-column">
                              <h6 class="mb-0">{{ $booking->customer_name }}</h6>
                              <small class="text-muted">{{ $booking->customer_email }}</small>
                              <small class="text-muted">{{ $booking->customer_phone }}</small>
                            </div>
                          </td>
                          <td>
                            @if($booking->product)
                              <div class="d-flex flex-column">
                                <span class="fw-medium">{{ $booking->product->name }}</span>
                                <small class="text-muted">Qty: {{ $booking->quantity }}</small>
                              </div>
                            @else
                              <span class="text-muted">General Booking</span>
                            @endif
                          </td>
                          <td>
                            @if($booking->venue)
                              <div class="d-flex flex-column">
                                <span class="fw-medium">{{ $booking->venue->venuename }}</span>
                                <small class="text-muted">{{ $booking->venue->location }}</small>
                              </div>
                            @else
                              <span class="text-muted">No venue</span>
                            @endif
                          </td>
                          <td>
                            <div class="d-flex flex-column">
                              <span class="fw-medium">{{ $booking->booking_date->format('M j, Y') }}</span>
                              <small class="text-muted">{{ $booking->booking_time->format('g:i A') }}</small>
                            </div>
                          </td>
                          <td>
                            <span class="fw-medium">Rs.{{ number_format($booking->total_amount, 2) }}</span>
                          </td>
                          <td>
                            <span class="badge bg-label-{{ $booking->status_color }}">
                              {{ ucfirst($booking->status) }}
                            </span>
                          </td>
                          <td>
                            <span class="text-muted">{{ $booking->created_at->format('M j, Y') }}</span>
                          </td>
                          <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning btn-sm">Edit</a>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.bookings.show', $booking) }}">
                                            <i class="bx bx-show me-1"></i> View Details
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.bookings.edit', $booking) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        @if($booking->status === 'pending')
                                          <div class="dropdown-divider"></div>
                                          <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="dropdown-item text-success">
                                              <i class="bx bx-check me-1"></i> Confirm
                                            </button>
                                          </form>
                                          <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="dropdown-item text-danger">
                                              <i class="bx bx-x me-1"></i> Cancel
                                            </button>
                                          </form>
                                        @endif
                                        @if($booking->status === 'confirmed')
                                          <div class="dropdown-divider"></div>
                                          <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="dropdown-item text-info">
                                              <i class="bx bx-check-circle me-1"></i> Mark Complete
                                            </button>
                                          </form>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="d-inline" 
                                              onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="dropdown-item text-danger">
                                            <i class="bx bx-trash me-1"></i> Delete
                                          </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <!-- Pagination -->
                  <div class="mt-4">
                    {{ $bookings->links() }}
                  </div>
                @else
                  <div class="text-center py-5">
                    <i class="bx bx-calendar-x bx-lg text-muted"></i>
                    <h5 class="mt-3 mb-1">No Bookings Found</h5>
                    <p class="text-muted mb-3">No bookings have been made yet.</p>
                    <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                      <i class="bx bx-plus me-1"></i> Add First Booking
                    </a>
                  </div>
                @endif
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Status Filter Script -->
  <script>
    document.getElementById('statusFilter').addEventListener('change', function() {
      const status = this.value;
      const url = new URL(window.location);
      if (status) {
        url.searchParams.set('status', status);
      } else {
        url.searchParams.delete('status');
      }
      window.location = url;
    });

    // Set current filter value
    const urlParams = new URLSearchParams(window.location.search);
    const currentStatus = urlParams.get('status');
    if (currentStatus) {
      document.getElementById('statusFilter').value = currentStatus;
    }
  </script>

@endsection