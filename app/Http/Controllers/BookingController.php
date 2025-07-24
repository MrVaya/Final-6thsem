<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Venue;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['product', 'venue']);
        
        // Filter by status if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $bookings = $query->latest()->paginate(15);
        
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::active()->get();
        $venues = Venue::all();
        return view('admin.bookings.create', compact('products', 'venues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'nullable|exists:products,id',
            'venue_id' => 'nullable|exists:venues,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
            'admin_notes' => 'nullable|string'
        ]);

        // Combine booking_date and booking_time
        $validated['booking_time'] = $validated['booking_date'] . ' ' . $validated['booking_time'];

        Booking::create($validated);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Store a booking from frontend (public)
     */
    public function storeFromFrontend(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'nullable|exists:products,id',
            'venue_id' => 'nullable|exists:venues,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:khalti,cash',
            'notes' => 'nullable|string'
        ]);

        // Calculate total amount based on venue price
        $totalAmount = 0;
        if (!empty($validated['venue_id'])) {
            $venue = Venue::find($validated['venue_id']);
            if ($venue && isset($venue->price)) {
                $totalAmount = $venue->price * $validated['quantity'];
            }
        }
        
        // If venue has no price or total amount is still 0, try to use product price as fallback
        if ($totalAmount == 0 && !empty($validated['product_id'])) {
            $product = Product::find($validated['product_id']);
            if ($product) {
                $totalAmount = $product->price * $validated['quantity'];
            }
        }
        
        // Set a default price if still 0
        if ($totalAmount == 0) {
            $totalAmount = 1000.00 * $validated['quantity']; // Default price of 1000 per hour
        }

        // Combine booking_date and booking_time
        $bookingDate = $validated['booking_date'];
        $bookingTime = $validated['booking_time'];
        $venueId = $validated['venue_id'] ?? null;
        $datetime = $bookingDate . ' ' . $bookingTime;

        // Prevent duplicate booking for same venue, date, and time
        $exists = \App\Models\Booking::where('venue_id', $venueId)
            ->whereDate('booking_time', $bookingDate)
            ->whereTime('booking_time', $bookingTime)
            ->exists();
        if ($exists) {
            $errorMsg = 'This time slot is already booked for the selected venue.';
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => $errorMsg], 422);
            }
            return redirect()->back()->withErrors(['booking_time' => $errorMsg])->withInput();
        }

        $validated['booking_time'] = $datetime;
        $validated['total_amount'] = $totalAmount;
        
        // Set status based on payment method
        if ($validated['payment_method'] === 'cash') {
            $validated['status'] = Booking::STATUS_CONFIRMED;
            $validated['payment_status'] = 'completed';
        } else {
            $validated['status'] = Booking::STATUS_PENDING;
            $validated['payment_status'] = 'pending';
        }

        $booking = Booking::create($validated);

        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your booking has been submitted successfully! We will contact you soon.',
                'booking_id' => $booking->id
            ]);
        }

        return redirect()->back()->with('success', 'Your booking has been submitted successfully! We will contact you soon.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking->load(['product', 'venue']);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $products = Product::active()->get();
        $venues = Venue::all();
        return view('admin.bookings.edit', compact('booking', 'products', 'venues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_id' => 'nullable|exists:products,id',
            'venue_id' => 'nullable|exists:venues,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
            'admin_notes' => 'nullable|string'
        ]);

        // Combine booking_date and booking_time
        $validated['booking_time'] = $validated['booking_date'] . ' ' . $validated['booking_time'];

        $booking->update($validated);

        return redirect()->route('admin.bookings.edit', $booking->id)->with('success', 'Edit successful');
    }

    /**
     * Update booking status
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'admin_notes' => 'nullable|string'
        ]);

        $booking->update($validated);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }

    /**
     * Get pending bookings count (for admin dashboard)
     */
    public function getPendingCount()
    {
        return Booking::pending()->count();
    }

    /**
     * Get booked times for a venue and date (AJAX endpoint)
     */
    public function getBookedTimes(Request $request)
    {
        $venueId = $request->input('venue_id');
        $date = $request->input('date');
        $bookedTimes = \App\Models\Booking::where('venue_id', $venueId)
            ->whereDate('booking_time', $date)
            ->pluck('booking_time')
            ->map(function($dt) { return date('H:i', strtotime($dt)); })
            ->toArray();
        return response()->json(['booked_times' => $bookedTimes]);
    }
}