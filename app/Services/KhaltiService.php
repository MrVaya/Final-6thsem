<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class KhaltiService
{
    /**
     * Khalti configuration properties
     */
    protected $publicKey;
    protected $secretKey;
    protected $successUrl;
    protected $failureUrl;
    protected $verifyUrl;
    
    /**
     * Constructor to initialize configuration from config
     */
    public function __construct()
    {
        $this->publicKey = config('khalti.public_key');
        $this->secretKey = config('khalti.secret_key');
        $this->successUrl = config('khalti.success_url') ?: route('khalti.success');
        $this->failureUrl = config('khalti.failure_url') ?: route('khalti.failure');
        $this->verifyUrl = config('khalti.verify_url');
    }
    
    /**
     * Get Khalti public key for frontend
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
    
    /**
     * Prepare payment configuration for frontend
     */
    public function preparePaymentConfig(Booking $booking)
    {
        return [
            'publicKey' => $this->publicKey,
            'productIdentity' => 'court_booking_' . $booking->id,
            'productName' => 'Court Booking - ' . ($booking->venue->venuename ?? 'Futsal Court'),
            'productUrl' => url('/'),
            'amount' => $booking->total_amount * 100, // Convert to paisa (1 NPR = 100 paisa)
            'successUrl' => $this->successUrl,
            'failureUrl' => $this->failureUrl,
        ];
    }
    
    /**
     * Update booking with payment initiated status
     */
    public function markPaymentInitiated(Booking $booking)
    {
        $booking->update([
            'payment_method' => 'khalti',
            'payment_status' => 'pending'
        ]);
        
        Log::info('Khalti payment initiated', ['booking_id' => $booking->id]);
        
        return $booking;
    }
    
    /**
     * Verify payment with Khalti API
     */
    public function verifyPayment($token, $amount)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->post($this->verifyUrl, [
                'token' => $token,
                'amount' => $amount, // Amount should be in paisa
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                
                // Check if payment verification was successful
                if (isset($responseData['idx']) && $responseData['amount'] == $amount) {
                    Log::info('Khalti payment verification successful', [
                        'token' => $token,
                        'amount' => $amount,
                        'response' => $responseData
                    ]);
                    
                    return [
                        'success' => true,
                        'data' => $responseData,
                        'transaction_id' => $responseData['idx']
                    ];
                }
            }
            
            Log::error('Khalti payment verification failed', [
                'token' => $token,
                'amount' => $amount,
                'response' => $response->json()
            ]);
            
            return [
                'success' => false,
                'message' => 'Payment verification failed',
                'response' => $response->json()
            ];
            
        } catch (Exception $e) {
            Log::error('Khalti payment verification error', [
                'token' => $token,
                'amount' => $amount,
                'error' => $e->getMessage()
            ]);
            
            return [
                'success' => false,
                'message' => 'Payment verification error: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Update booking with successful payment
     */
    public function markPaymentSuccessful(Booking $booking, $transactionId, $responseData)
    {
        $booking->update([
            'payment_status' => 'completed',
            'payment_id' => $transactionId,
            'payment_response' => json_encode($responseData),
            'status' => Booking::STATUS_CONFIRMED
        ]);
        
        Log::info('Khalti payment successful', [
            'booking_id' => $booking->id,
            'transaction_id' => $transactionId
        ]);
        
        return $booking;
    }
    
    /**
     * Update booking with failed payment
     */
    public function markPaymentFailed(Booking $booking, $responseData)
    {
        $booking->update([
            'payment_status' => 'failed',
            'payment_response' => json_encode($responseData)
        ]);
        
        Log::info('Khalti payment failed', [
            'booking_id' => $booking->id,
            'response' => $responseData
        ]);
        
        return $booking;
    }
}