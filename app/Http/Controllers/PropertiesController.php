<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertiesController extends Controller
{
    /**
     * Display the properties form.
     */
    public function index(Request $request)
    {
        return view('properties.index');
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        
    }

    public function edit(Request $request, Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        
    }

    public function show(Request $request, Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function destroy(Request $request, Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
