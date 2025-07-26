@extends('admin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Booking Details</h4>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bx bx-arrow-back me-1"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Customer Name</dt>
                        <dd class="col-sm-8">{{ $booking->customer_name }}</dd>
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $booking->customer_email }}</dd>
                        <dt class="col-sm-4">Phone</dt>
                        <dd class="col-sm-8">{{ $booking->customer_phone }}</dd>
                        <dt class="col-sm-4">Product</dt>
                        <dd class="col-sm-8">{{ $booking->product ? $booking->product->name : 'General Booking' }}</dd>
                        <dt class="col-sm-4">Venue</dt>
                        <dd class="col-sm-8">{{ $booking->venue ? $booking->venue->venuename : 'N/A' }}</dd>
                        <dt class="col-sm-4">Date & Time</dt>
                        <dd class="col-sm-8">{{ $booking->booking_date->format('M j, Y') }} {{ $booking->booking_time->format('g:i A') }}</dd>
                        <dt class="col-sm-4">Quantity</dt>
                        <dd class="col-sm-8">{{ $booking->quantity }}</dd>
                        <dt class="col-sm-4">Total Amount</dt>
                        <dd class="col-sm-8">Rs.{{ number_format($booking->total_amount, 2) }}</dd>
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-label-{{ $booking->status_color }}">{{ ucfirst($booking->status) }}</span>
                        </dd>
                        <dt class="col-sm-4">Created At</dt>
                        <dd class="col-sm-8">{{ $booking->created_at->format('M j, Y g:i A') }}</dd>
                        <dt class="col-sm-4">Notes</dt>
                        <dd class="col-sm-8">{{ $booking->notes ?: 'N/A' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
