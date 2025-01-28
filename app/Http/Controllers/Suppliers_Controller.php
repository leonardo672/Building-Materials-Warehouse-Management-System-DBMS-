<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class Suppliers_Controller extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all(); // Retrieve all suppliers
        return view('suppliers.index', compact('suppliers')); // Return the view with suppliers
    }

    /**
     * Show the form for creating a new supplier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create'); // Return the view for creating a new supplier
    }

    /**
     * Store a newly created supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact_email' => 'required|email|unique:suppliers,contact_email|max:100',
            'contact_phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        // Create a new supplier with validated data
        Supplier::create($validated);

        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully!');
    }

    /**
     * Display the specified supplier.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier')); // Return the view for showing supplier details
    }

    /**
     * Show the form for editing the specified supplier.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier')); // Return the view for editing supplier details
    }

    /**
     * Update the specified supplier in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact_email' => 'required|email|unique:suppliers,contact_email,' . $supplier->id . '|max:100',
            'contact_phone' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        // Update the supplier with validated data
        $supplier->update($validated);

        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
    }

    /**
     * Remove the specified supplier from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // Delete the supplier
        $supplier->delete();

        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully!');
    }
}
