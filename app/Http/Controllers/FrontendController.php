<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\HeroSection;

class FrontendController extends Controller
{
    public function index()
    {
        // Get active hero sections
        $heroSections = HeroSection::active()->ordered()->get();
        
        // Get active categories with products count
        $categories = Category::active()
            ->withCount('products')
            ->ordered()
            ->take(12)
            ->get();
        
        // Get best selling products (you can add a best_selling flag or use order count)
        $bestSellingProducts = Product::with('category')
            ->active()
            ->inStock()
            ->take(10)
            ->get();
            
        // Get featured categories for display
        $featuredCategories = Category::active()
            ->ordered()
            ->take(8)
            ->get();

        return view('frontend.index', compact(
            'heroSections', 
            'categories', 
            'bestSellingProducts',
            'featuredCategories'
        ));
    }
} 