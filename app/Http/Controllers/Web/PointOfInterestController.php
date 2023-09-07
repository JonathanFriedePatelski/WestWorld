<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PointOfInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PointOfInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PointOfInterest::all();
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

        PointOfInterest::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(PointOfInterest $pointOfInterest)
    {
        return $pointOfInterest;
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
            return;
        }

        $data = $request->only([
            'title' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'description' => 'string',
            'type' => 'string|exists:locations,type',
            'narrative_level' => 'string',
        ]);

        PointOfInterest::findOrFail($id)
            ->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
