<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

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
            'contact_person_name' => 'required|string|max:255'
        ]);

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
            'contact_person_name' => 'required|string|max:255'
        ]);

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