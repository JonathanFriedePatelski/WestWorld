<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Models\IncidentReport;
use Illuminate\Http\Request;

class IncidentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Incident::pluck('report', 'id');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return $incident->pluck('report', 'id');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncidentReport $incidentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentReport $incidentReport)
    {
        //
    }
}
