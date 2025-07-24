<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tournament;
use App\Models\HeroSection;
use App\Models\Venue;

class FrontendController extends Controller
{
    public function index()
    {
        // Get active hero sections
        $heroSections = HeroSection::active()->ordered()->get();
        
        // Get active tournaments with products count
        $tournaments = Tournament::active()
            ->withCount('products')
            ->ordered()
            ->get();
        
        // Get best selling products (equipment for futsal)
        $bestSellingProducts = Product::with('category')
            ->active()
            ->inStock()
            ->take(10)
            ->get();
            
        // Get featured tournaments for display
        $featuredTournaments = Tournament::active()
            ->where('is_featured', true)
            ->ordered()
            ->take(4)
            ->get();

        // Get futsal courts/venues
        $venues = Venue::take(6)->get();

        $products = \App\Models\Product::active()->get();

        return view('frontend.index', [
            'heroSections' => $heroSections,
            'tournaments' => $tournaments,
            
            'featuredTournaments' => $featuredTournaments,
            'venues' => $venues,
            'products' => $products
        ]);
    }

    public function venues()
    {
        $venues = Venue::all();
        return view('frontend.venues', compact('venues'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Here you would typically save to database or send email
        // For now, we'll just redirect with success message
        
        return redirect()->route('frontend.contact')
                        ->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function services()
    {
        $venues = Venue::all();
        return view('frontend.services', compact('venues'));
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function terms()
    {
        return view('frontend.terms');
    }

    public function gallery()
    {
        $venues = Venue::all();
        return view('frontend.gallery', compact('venues'));
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function tournaments()
    {
        $tournaments = \App\Models\Tournament::all();
        return view('frontend.tournaments', compact('tournaments'));
    }
    
    /**
     * Display booking success page
     */
    public function bookingSuccess($id)
    {
        $booking = \App\Models\Booking::with(['venue'])->findOrFail($id);
        
        // Only show success page if payment is completed
        if ($booking->payment_status !== 'completed') {
            return redirect()->route('frontend.index')
                ->with('error', 'Invalid booking status.');
        }
        
        return view('frontend.payments.success', compact('booking'));
    }
    
    /**
     * Display booking failure page
     */
    public function bookingFailure($id)
    {
        $booking = \App\Models\Booking::with(['venue'])->findOrFail($id);
        
        return view('frontend.payments.failure', compact('booking'));
    }
}