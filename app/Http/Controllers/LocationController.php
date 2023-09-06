<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Location::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|string',
            'narrative_level' => 'required|string',
        ]);

        $location = Location::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Location::findOrFail($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make([
            'title' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'description' => 'string',
            'type' => 'string|exists:locations,type',
            'narrative_level' => 'string',
        ]);

        if ($validation->fails()) {
            return 
        }

        $data = $request->only([
            'title' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'description' => 'string',
            'type' => 'string|exists:locations,type',
            'narrative_level' => 'string',
        ]);

        Location::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
