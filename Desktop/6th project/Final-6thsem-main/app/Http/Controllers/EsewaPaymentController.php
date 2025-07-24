<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Services\EsewaService;
use Illuminate\Support\Facades\Log;

class EsewaPaymentController extends Controller
{
    /**
     * The eSewa service instance.
     */
    protected $esewaService;
    
    /**
     * Constructor to initialize the eSewa service
     */
    public function __construct(EsewaService $esewaService)
    {
        $this->esewaService = $esewaService;
    }
    
    /**
     * Initiate payment to eSewa
     */
    public function initiatePayment(Request $request, $bookingId)
    {
        // Find the booking
        $booking = Booking::findOrFail($bookingId);
        
        // Mark payment as initiated
        $this->esewaService->markPaymentInitiated($booking);
        
        // Prepare eSewa payment parameters
        $params = $this->esewaService->preparePaymentParams($booking);
        
        // Log the payment initiation
        Log::info('eSewa payment initiated', ['booking_id' => $booking->id, 'params' => $params]);
        
        // Return view with eSewa form
        return view('frontend.payments.esewa-form', [
            'esewaUrl' => $this->esewaService->getEsewaUrl(),
            'params' => $params
        ]);
    }
    
    /**
     * Handle successful payment
     */
    public function success(Request $request)
    {
        // Get parameters from eSewa response
        $pid = $request->input('pid');
        $refId = $request->input('refId');
        $amount = $request->input('amt');
        
        // Find the booking
        $booking = Booking::findOrFail($pid);
        
        // Mark payment as successful
        $this->esewaService->markPaymentSuccessful($booking, $refId, $request->all());
        
        // Redirect to success page
        return redirect()->route('frontend.booking.success', ['id' => $booking->id])
            ->with('success', 'Your payment was successful! Your booking has been confirmed.');
    }
    
    /**
     * Handle failed payment
     */
    public function failure(Request $request)
    {
        // Get parameters from eSewa response
        $pid = $request->input('pid');
        
        // Find the booking
        $booking = Booking::findOrFail($pid);
        
        // Mark payment as failed
        $this->esewaService->markPaymentFailed($booking, $request->all());
        
        // Redirect to failure page
        return redirect()->route('frontend.booking.failure', ['id' => $booking->id])
            ->with('error', 'Your payment was not successful. Please try again or contact support.');
    }
}