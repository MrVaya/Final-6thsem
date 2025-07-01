<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Services\ImageUploadService;
use Illuminate\Support\Str;

class TournamentController extends Controller
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
        $tournaments = Tournament::withCount('products')->ordered()->paginate(15);
        return view('admin.tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $this->imageUploadService->uploadImage($request->file('image'), 'tournaments');
        }

        Tournament::create($validated);

        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        $tournament->load(['products' => function($query) {
            $query->latest()->take(10);
        }]);
        return view('admin.tournaments.show', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        return view('admin.tournaments.edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $tournament->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer'
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($tournament->image) {
                $this->imageUploadService->deleteImage($tournament->image);
            }
            $validated['image'] = $this->imageUploadService->uploadImage($request->file('image'), 'tournaments');
        }

        $tournament->update($validated);

        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        // Check if tournament has products
        if ($tournament->products()->count() > 0) {
            return redirect()->route('admin.tournaments.index')->with('error', 'Cannot delete tournament with existing products.');
        }

        // Delete image
        if ($tournament->image) {
            $this->imageUploadService->deleteImage($tournament->image);
        }

        $tournament->delete();

        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament deleted successfully.');
    }
}