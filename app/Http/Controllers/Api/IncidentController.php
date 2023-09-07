<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Enums\IncidentType;
use App\Enums\IncidentSeverity;

class IncidentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        return Incident::all()->toJson();
    }

    /**
     * Store a newly created incident in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'type' => 'required|in:' . implode(',', array_map(fn($type) => $type->value, IncidentType::cases())),
            'severity' => 'required|in:' . implode(',', array_map(fn($severity) => $severity->value, IncidentSeverity::cases())),
            'description' => 'nullable|string',
            'report' => 'nullable|string',
            'occurred_at' => 'required|date',
            'point_of_interest_id' => 'nullable|exists:points_of_interest,id',
        ]);
    
        // check if validation was successful
        if (!$validatedData) {
            return response()->json(['message' => 'Validation failed'], 400);
        }
        
        $incident = Incident::create($validatedData);
    
        return response()->json(['message' => 'Incident saved successfully']);
    }    
}