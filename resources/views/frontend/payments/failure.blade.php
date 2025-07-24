@extends('frontend.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <div class="bg-danger text-white d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                <i class="bx bx-x-circle" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                        <h2 class="mb-3">Payment Failed</h2>
                        <p class="text-muted mb-4">Your payment could not be processed. Please try again or contact our support team.</p>
                        
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
                                        <p><strong>Amount:</strong> Rs. {{ number_format($booking->total_amount, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('frontend.index') }}" class="btn btn-outline-primary px-4">Back to Home</a>
                            <a href="{{ route('khalti.initiate', ['bookingId' => $booking->id ?? 0]) }}" class="btn btn-primary px-4">Try Again</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection