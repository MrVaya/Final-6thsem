<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Services\KhaltiService;
use Illuminate\Support\Facades\Log;

class KhaltiPaymentController extends Controller
{
    /**
     * The Khalti service instance.
     */
    protected $khaltiService;
    
    /**
     * Constructor to initialize the Khalti service
     */
    public function __construct(KhaltiService $khaltiService)
    {
        $this->khaltiService = $khaltiService;
    }
    
    /**
     * Initiate payment to Khalti
     */
    public function initiatePayment(Request $request, $bookingId)
    {
        try {
            // Find the booking
            $booking = Booking::with('venue')->findOrFail($bookingId);
            
            // Check if booking belongs to authenticated user (optional security check)
            if (auth()->check() && $booking->customer_email !== auth()->user()->email) {
                return redirect()->route('frontend.home')
                    ->with('error', 'Unauthorized access to booking.');
            }
            
            // Mark payment as initiated
            $this->khaltiService->markPaymentInitiated($booking);
            
            // Prepare Khalti payment configuration
            $paymentConfig = $this->khaltiService->preparePaymentConfig($booking);
            
            // Log the payment initiation
            Log::info('Khalti payment page loaded', ['booking_id' => $booking->id, 'config' => $paymentConfig]);
            
            // Return view with Khalti configuration
            return view('frontend.payments.khalti-form', [
                'booking' => $booking,
                'paymentConfig' => $paymentConfig
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error initiating Khalti payment', [
                'booking_id' => $bookingId,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->route('frontend.home')
                ->with('error', 'Error processing payment. Please try again.');
        }
    }
    
    /**
     * Verify payment from Khalti (AJAX endpoint)
     */
    public function verifyPayment(Request $request)
    {
        try {
            $validated = $request->validate([
                'token' => 'required|string',
                'amount' => 'required|integer',
                'booking_id' => 'required|integer|exists:bookings,id'
            ]);
            
            // Find the booking
            $booking = Booking::findOrFail($validated['booking_id']);
            
            // Verify payment with Khalti
            $verificationResult = $this->khaltiService->verifyPayment(
                $validated['token'],
                $validated['amount']
            );
            
            if ($verificationResult['success']) {
                // Mark payment as successful
                $this->khaltiService->markPaymentSuccessful(
                    $booking,
                    $verificationResult['transaction_id'],
                    $verificationResult['data']
                );
                
                return response()->json([
                    'success' => true,
                    'message' => 'Payment verified successfully!',
                    'redirect_url' => route('frontend.booking.success', ['id' => $booking->id])
                ]);
            } else {
                // Mark payment as failed
                $this->khaltiService->markPaymentFailed($booking, $verificationResult);
                
                return response()->json([
                    'success' => false,
                    'message' => $verificationResult['message'] ?? 'Payment verification failed',
                    'redirect_url' => route('frontend.booking.failure', ['id' => $booking->id])
                ]);
            }
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Error verifying Khalti payment', [
                'request_data' => $request->all(),
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error processing payment verification. Please contact support.'
            ], 500);
        }
    }
    
    /**
     * Handle successful payment (legacy route for backward compatibility)
     */
    public function success(Request $request)
    {
        // This can be used for direct success redirects if needed
        $bookingId = $request->input('booking_id');
        
        if ($bookingId) {
            return redirect()->route('frontend.booking.success', ['id' => $bookingId]);
        }
        
        return redirect()->route('frontend.home')
            ->with('success', 'Payment completed successfully!');
    }
    
    /**
     * Handle failed payment (legacy route for backward compatibility)
     */
    public function failure(Request $request)
    {
        // This can be used for direct failure redirects if needed
        $bookingId = $request->input('booking_id');
        
        if ($bookingId) {
            return redirect()->route('frontend.booking.failure', ['id' => $bookingId]);
        }
        
        return redirect()->route('frontend.home')
            ->with('error', 'Payment was not successful. Please try again.');
    }
}