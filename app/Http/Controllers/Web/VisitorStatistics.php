<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\VisitorStatistic;
use Illuminate\Http\Request;

class VisitorStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visitorStatistic.show', ['visitorStatistic' => VisitorStatistic::all()]);
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
    public function show(VisitorStatistic $visitorStatistic)
    {
        return view('visitorStatistic.show', ['visitorStatistic' => $visitorStatistic]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
