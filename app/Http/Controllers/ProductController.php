<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tournament;
use App\Services\ImageUploadService;

class ProductController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tournaments = Tournament::active()->ordered()->get();
        return view('admin.products.create', compact('tournaments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tournament_id' => 'required|exists:tournaments,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'sku' => 'nullable|string|unique:products,sku',
            'weight' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $this->imageUploadService->uploadImage($request->file('image'), 'products');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $this->imageUploadService->uploadImage($image, 'products/gallery');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category', 'bookings');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $tournaments = Tournament::active()->ordered()->get();
        return view('admin.products.edit', compact('product', 'tournaments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tournament_id' => 'required|exists:tournaments,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
            'weight' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                $this->imageUploadService->deleteImage($product->image);
            }
            $validated['image'] = $this->imageUploadService->uploadImage($request->file('image'), 'products');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images if exists
            if ($product->gallery_images) {
                foreach ($product->gallery_images as $image) {
                    $this->imageUploadService->deleteImage($image);
                }
            }
            
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $this->imageUploadService->uploadImage($image, 'products/gallery');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete images
        if ($product->image) {
            $this->imageUploadService->deleteImage($product->image);
        }
        
        if ($product->gallery_images) {
            foreach ($product->gallery_images as $image) {
                $this->imageUploadService->deleteImage($image);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
} 