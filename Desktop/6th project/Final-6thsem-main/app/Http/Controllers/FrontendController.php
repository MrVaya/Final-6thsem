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

        return view('frontend.index', compact(
            'heroSections', 
            'tournaments', 
            'bestSellingProducts',
            'featuredTournaments',
            'venues'
        ));
    }
} 