<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Crew;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crew.index', ['crews' => Crew::all()]);
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
    public function show(Crew $crew)
    {
        return view('crew.show', ['crew' => $crew]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crew $crew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crew $crew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crew $crew)
    {
        //
    }
}
