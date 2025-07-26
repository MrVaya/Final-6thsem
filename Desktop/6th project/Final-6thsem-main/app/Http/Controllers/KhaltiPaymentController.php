<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class KhaltiPaymentController extends Controller
{
    public function verifyPayment(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY')
        ])->post('https://khalti.com/api/v2/payment/verify/', [
            'token' => $request->token,
            'amount' => $request->amount
        ]);

        if ($response->successful()) {
            $payload = $response->json();
            // Save booking and payment to database
            Booking::create([
                'user_id' => Auth::check() ? Auth::id() : 1,
                'court_id' => $request->court_id ?? 1,
                'amount' => $request->amount,
                'transaction_id' => $payload['idx'] ?? null,
                'payment_status' => 'paid'
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error' => $response->json()]);
        }
    }
}
