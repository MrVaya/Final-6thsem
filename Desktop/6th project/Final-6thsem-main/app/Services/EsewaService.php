<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class EsewaService
{
    /**
     * eSewa configuration properties
     */
    protected $esewaUrl;
    protected $merchantCode;
    protected $successUrl;
    protected $failureUrl;
    protected $serviceCharge;
    protected $deliveryCharge;
    
    /**
     * Constructor to initialize configuration from config
     */
    public function __construct()
    {
        $this->esewaUrl = config('esewa.url');
        $this->merchantCode = config('esewa.merchant_code');
        $this->successUrl = config('esewa.success_url') ?: route('esewa.success');
        $this->failureUrl = config('esewa.failure_url') ?: route('esewa.failure');
        $this->serviceCharge = config('esewa.service_charge', 0);
        $this->deliveryCharge = config('esewa.delivery_charge', 0);
    }
    
    /**
     * Get eSewa URL
     */
    public function getEsewaUrl()
    {
        return $this->esewaUrl;
    }
    
    /**
     * Prepare payment parameters for a booking
     */
    public function preparePaymentParams(Booking $booking)
    {
        return [
            'amt' => $booking->total_amount,
            'pdc' => $this->deliveryCharge,
            'psc' => $this->serviceCharge,
            'txAmt' => 0, // Tax amount if applicable
            'tAmt' => $booking->total_amount + $this->serviceCharge + $this->deliveryCharge,
            'pid' => $booking->id,
            'scd' => $this->merchantCode,
            'su' => $this->successUrl,
            'fu' => $this->failureUrl
        ];
    }
    
    /**
     * Update booking with payment initiated status
     */
    public function markPaymentInitiated(Booking $booking)
    {
        $booking->update([
            'payment_method' => 'esewa',
            'payment_status' => 'pending'
        ]);
        
        Log::info('eSewa payment initiated', ['booking_id' => $booking->id]);
        
        return $booking;
    }
    
    /**
     * Update booking with successful payment
     */
    public function markPaymentSuccessful(Booking $booking, $refId, $responseData)
    {
        $booking->update([
            'payment_status' => 'completed',
            'payment_id' => $refId,
            'payment_response' => json_encode($responseData),
            'status' => Booking::STATUS_CONFIRMED
        ]);
        
        Log::info('eSewa payment successful', [
            'booking_id' => $booking->id,
            'ref_id' => $refId
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
        
        Log::info('eSewa payment failed', [
            'booking_id' => $booking->id,
            'response' => $responseData
        ]);
        
        return $booking;
    }
}