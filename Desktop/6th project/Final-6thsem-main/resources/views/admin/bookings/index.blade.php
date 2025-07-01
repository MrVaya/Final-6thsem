@extends('admin.layouts.app')
@section('content')

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <div class="layout-page">
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            
            <!-- Header -->
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Booking Management</h4>
                      <p class="text-muted mb-0">Manage all customer bookings and requests</p>
                    </div>
                    <div>
                      <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add New Booking
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row mb-4">
              <div class="col-lg-3 col-md-6 col-6 mb-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="avatar mx-auto mb-2">
                      <span class="avatar-initial rounded bg-label-warning">
                        <i class="bx bx-time bx-sm"></i>
                      </span>
                    </div>
                    <h4 class="mb-1">{{ $bookings->where('status', 'pending')->count() }}</h4>
                    <p class="mb-0">Pending</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-6 mb-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="avatar mx-auto mb-2">
                      <span class="avatar-initial rounded bg-label-success">
                        <i class="bx bx-check bx-sm"></i>
                      </span>
                    </div>
                    <h4 class="mb-1">{{ $bookings->where('status', 'confirmed')->count() }}</h4>
                    <p class="mb-0">Confirmed</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-6 mb-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="avatar mx-auto mb-2">
                      <span class="avatar-initial rounded bg-label-info">
                        <i class="bx bx-check-circle bx-sm"></i>
                      </span>
                    </div>
                    <h4 class="mb-1">{{ $bookings->where('status', 'completed')->count() }}</h4>
                    <p class="mb-0">Completed</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-6 mb-3">
                <div class="card">
                  <div class="card-body text-center">
                    <div class="avatar mx-auto mb-2">
                      <span class="avatar-initial rounded bg-label-danger">
                        <i class="bx bx-x bx-sm"></i>
                      </span>
                    </div>
                    <h4 class="mb-1">{{ $bookings->where('status', 'cancelled')->count() }}</h4>
                    <p class="mb-0">Cancelled</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Bookings Table -->
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Bookings</h5>
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
                            <span class="fw-medium">${{ number_format($booking->total_amount, 2) }}</span>
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