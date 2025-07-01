<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Services\ImageUploadService;

class HeroSectionController extends Controller
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
        $heroSections = HeroSection::ordered()->paginate(10);
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $this->imageUploadService->uploadImage(
                $request->file('background_image'), 
                'hero-sections'
            );
        }

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
        return view('admin.hero-sections.show', compact('heroSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB
            'cta_text' => 'nullable|string|max:100',
            'cta_link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($heroSection->background_image) {
                $this->imageUploadService->deleteImage($heroSection->background_image);
            }
            $validated['background_image'] = $this->imageUploadService->uploadImage(
                $request->file('background_image'), 
                'hero-sections'
            );
        }

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        // Delete background image
        if ($heroSection->background_image) {
            $this->imageUploadService->deleteImage($heroSection->background_image);
        }

        $heroSection->delete();

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section deleted successfully.');
    }
}