@extends('frontend.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <div class="bg-success text-white d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                <i class="bx bx-check-circle" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h2 class="mb-3">Payment Successful!</h2>
                        <p class="text-muted mb-4">Your booking has been confirmed. Thank you for choosing FUTBOOK!</p>
                        
                        @if(isset($booking))
                        <div class="card bg-light mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Booking Details</h5>
                                <div class="row mt-3">
                                    <div class="col-md-6 text-start">
                                        <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                                        <p><strong>Court:</strong> {{ $booking->venue->venuename ?? 'N/A' }}</p>
                                        <p><strong>Date & Time:</strong> {{ $booking->booking_time->format('M d, Y h:i A') }}</p>
                                    </div>
                                    <div class="col-md-6 text-start">
                                        <p><strong>Duration:</strong> {{ $booking->quantity }} hour(s)</p>
                                        <p><strong>Amount Paid:</strong> Rs. {{ number_format($booking->total_amount, 2) }}</p>
                                        <p><strong>Payment Method:</strong> eSewa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('frontend.index') }}" class="btn btn-outline-primary px-4">Back to Home</a>
                            <a href="{{ route('frontend.venues') }}" class="btn btn-primary px-4">Book Another Court</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection