@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Payment Details</h4>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Back to Payments</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-4">Booking Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Booking ID</th>
                                    <td>{{ $booking->id }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $booking->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{ $booking->customer_email }}</td>
                                </tr>
                                <tr>
                                    <th>Customer Phone</th>
                                    <td>{{ $booking->customer_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Court</th>
                                    <td>
                                        @if($booking->venue)
                                            {{ $booking->venue->venuename }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Booking Date</th>
                                    <td>{{ $booking->booking_date }}</td>
                                </tr>
                                <tr>
                                    <th>Booking Time</th>
                                    <td>{{ $booking->booking_time }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $booking->quantity }} hour(s)</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($booking->status == \App\Models\Booking::STATUS_PENDING)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->status == \App\Models\Booking::STATUS_CONFIRMED)
                                            <span class="badge bg-success">Confirmed</span>
                                        @elseif($booking->status == \App\Models\Booking::STATUS_CANCELLED)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @elseif($booking->status == \App\Models\Booking::STATUS_COMPLETED)
                                            <span class="badge bg-info">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Notes</th>
                                    <td>{{ $booking->notes ?: 'No notes' }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h5 class="mb-4">Payment Information</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Amount</th>
                                    <td>Rs. {{ number_format($booking->total_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>
                                        @if($booking->payment_method)
                                            <span class="badge bg-info">{{ ucfirst($booking->payment_method) }}</span>
                                        @else
                                            <span class="badge bg-secondary">Not Set</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment ID</th>
                                    <td>
                                        @if($booking->payment_id)
                                            {{ $booking->payment_id }}
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>
                                        @if($booking->payment_status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($booking->payment_status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->payment_status == 'failed')
                                            <span class="badge bg-danger">Failed</span>
                                        @else
                                            <span class="badge bg-secondary">Not Paid</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Date</th>
                                    <td>{{ $booking->updated_at->format('M d, Y H:i:s') }}</td>
                                </tr>
                            </table>
                            
                            @if($paymentResponse)
                            <h5 class="mt-4 mb-3">Payment Response Details</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <pre class="mb-0">{{ json_encode($paymentResponse, JSON_PRETTY_PRINT) }}</pre>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Admin Actions</h5>
                                    <div class="mt-3">
                                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary">Edit Booking</a>
                                        
                                        @if($booking->status == \App\Models\Booking::STATUS_PENDING)
                                            <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Confirm Booking</button>
                                            </form>
                                        @endif
                                        
                                        @if($booking->status != \App\Models\Booking::STATUS_CANCELLED)
                                            <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel Booking</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection