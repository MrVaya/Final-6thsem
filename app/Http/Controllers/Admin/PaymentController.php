<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of payment transactions.
     */
    public function index()
    {
        // Get bookings with payment information, paginated
        $bookings = Booking::whereNotNull('payment_method')
            ->with(['venue'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Get payment statistics
        $totalTransactions = Booking::whereNotNull('payment_method')->count();
        $completedPayments = Booking::where('payment_status', 'completed')->count();
        $pendingPayments = Booking::where('payment_status', 'pending')->count();
        $failedPayments = Booking::where('payment_status', 'failed')->count();
        
        return view('admin.payments.index', compact(
            'bookings',
            'totalTransactions',
            'completedPayments',
            'pendingPayments',
            'failedPayments'
        ));
    }
    
    /**
     * Display payment details for a specific booking.
     */
    public function show($id)
    {
        $booking = Booking::with(['venue', 'product'])->findOrFail($id);
        
        // Parse payment response JSON if available
        $paymentResponse = null;
        if ($booking->payment_response) {
            $paymentResponse = json_decode($booking->payment_response, true);
        }
        
        return view('admin.payments.show', compact('booking', 'paymentResponse'));
    }
    
    /**
     * Display payment reports and statistics.
     */
    public function report()
    {
        // Get payment statistics
        $stats = [
            'total' => Booking::whereNotNull('payment_method')->count(),
            'completed' => Booking::where('payment_status', 'completed')->count(),
            'pending' => Booking::where('payment_status', 'pending')->count(),
            'failed' => Booking::where('payment_status', 'failed')->count(),
        ];
        
        // Get payment methods distribution
        $paymentMethods = Booking::whereNotNull('payment_method')
            ->select('payment_method', DB::raw('count(*) as count'))
            ->groupBy('payment_method')
            ->pluck('count', 'payment_method')
            ->toArray();
        
        // Get monthly payment statistics for the last 6 months
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('F Y');
            
            $monthlyStats[$month] = [
                'total' => Booking::whereNotNull('payment_method')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'completed' => Booking::where('payment_status', 'completed')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'pending' => Booking::where('payment_status', 'pending')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'failed' => Booking::where('payment_status', 'failed')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'amount' => Booking::where('payment_status', 'completed')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('total_amount'),
            ];
        }
        
        return view('admin.payments.report', compact('stats', 'paymentMethods', 'monthlyStats'));
    }
}