<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return view("admin.venues.index", compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.venues.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'venuename' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'contact_person_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('venues', 'public');
        }

        Venue::create($validated_data);

        return redirect()->route('admin.venues.index')->with('success', 'Venue created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return view("admin.venues.show", compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        return view("admin.venues.edit", compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        $validated_data = $request->validate([
            'venuename' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'contact_person_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($venue->image) {
                Storage::disk('public')->delete($venue->image);
            }
            $validated_data['image'] = $request->file('image')->store('venues', 'public');
        }

        $venue->update($validated_data);

        return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully!');
    }
}