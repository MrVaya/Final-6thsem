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
        $venue = Venue::all();
        return view("admin.futsal-places.index" ,compact('venue'));
        

    }

    /**
     * Show the form for creating a new resource.   
     */
    public function create()
    {
        return view("admin.futsal-places.create");

    }

    /**
     * Store a newly created resource in storage.       
     */
    public function store(Request $request)
    {$validate_data = $request->validate([
        'veunename' => 'required',
        'location' => 'required',
        'phone' => 'required',
        'contact_person_name' => 'required' ]);

        
        $venues = new Venue;
        $venues->veunename = $request->veunename;
        $venues->location = $request->location; 
        $venues->phone = $request->phone;
        $venues->contact_person_name = $request->contact_person_name;
        $venues->save();

        return redirect()->route('venue.index')->with('success', 'venues created successfully!');

  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
