<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Booking;
use App\Models\Venue;
use App\Models\HeroSection;
use App\Models\Tournament;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get key statistics
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::active()->count(),
            'total_tournaments' => Tournament::count(),
            'total_venues' => Venue::count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::pending()->count(),
            'confirmed_bookings' => Booking::confirmed()->count(),
            'total_revenue' => Booking::sum('total_amount'),
            'monthly_revenue' => Booking::whereMonth('created_at', Carbon::now()->month)
                ->sum('total_amount'),
            // Payment statistics
            'total_payments' => Booking::whereNotNull('payment_method')->count(),
            'completed_payments' => Booking::where('payment_status', 'completed')->count(),
            'pending_payments' => Booking::where('payment_status', 'pending')->count(),
            'failed_payments' => Booking::where('payment_status', 'failed')->count(),
            'esewa_payments' => Booking::where('payment_method', 'esewa')->count(),
        ];

        // Recent bookings
        $recentBookings = Booking::with(['product', 'venue'])
            ->latest()
            ->take(10)
            ->get();

        // Low stock products
        $lowStockProducts = Product::where('stock', '<=', 10)
            ->where('stock', '>', 0)
            ->with('tournament')
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();

        // Monthly booking trends (last 6 months)
        $monthlyBookings = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthlyBookings[] = [
                'month' => $date->format('M Y'),
                'count' => Booking::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'revenue' => Booking::where('status', 'completed')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('total_amount')
            ];
        }

        // Tournament performance
        $categoryPerformance = Tournament::withCount(['products'])
            ->with(['products' => function($query) {
                $query->withCount('bookings');
            }])
            ->get()
            ->map(function($tournament) {
                $totalBookings = $tournament->products->sum('bookings_count');
                return [
                    'name' => $tournament->name,
                    'products_count' => $tournament->products_count,
                    'bookings_count' => $totalBookings
                ];
            });

        // Recent activity
        $recentActivity = collect();
        
        // Add recent bookings to activity
        $recentBookings->each(function($booking) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'booking',
                'message' => "New booking from {$booking->customer_name}",
                'time' => $booking->created_at,
                'status' => $booking->status,
                'icon' => 'bx-calendar-check'
            ]);
        });

        // Add recent products to activity
        Product::latest()->take(5)->get()->each(function($product) use ($recentActivity) {
            $recentActivity->push([
                'type' => 'product',
                'message' => "Product '{$product->name}' was added",
                'time' => $product->created_at,
                'status' => $product->is_active ? 'active' : 'inactive',
                'icon' => 'bx-package'
            ]);
        });

        // Sort activity by time and take latest 15
        $recentActivity = $recentActivity->sortByDesc('time')->take(15);

        return view('admin.dashboard', compact(
            'stats',
            'recentBookings',
            'lowStockProducts',
            'monthlyBookings',
            'categoryPerformance',
            'recentActivity'
        ));
    }
}