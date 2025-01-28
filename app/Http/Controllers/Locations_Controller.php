<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class Locations_Controller extends Controller
{
    /**
     * Display a listing of the locations.
     */
    public function index()
    {
        $locations = Location::all(); // Fetch all locations
        return view('locations.index', compact('locations')); // Pass locations data to the view
    }

    /**
     * Show the form for creating a new location.
     */
    public function create()
    {
        return view('locations.create'); // Return the location creation form view
    }

    /**
     * Store a newly created location in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new location
        Location::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to the locations list with a success message
        return redirect()->route('locations.index')->with('success', 'Location created successfully!');
    }

    /**
     * Display the specified location.
     */
    public function show(string $id)
    {
        $location = Location::findOrFail($id); // Find the location by id
        return view('locations.show', compact('location')); // Pass the location data to the view
    }

    /**
     * Show the form for editing the specified location.
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }
    
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);
    
        $location->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }
    

    /**
     * Remove the specified location from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id); // Find the location by id
        $location->delete(); // Delete the location

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
