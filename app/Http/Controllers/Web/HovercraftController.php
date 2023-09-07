<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Hovercraft;
use Illuminate\Http\Request;

class HovercraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hovercraft.index', ['hovercrafts' => Hovercraft::orderBy('fuel_level', 'desc')->get()]);

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
    public function show(Hovercraft $hovercraft)
    {
        return $hovercraft;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hovercraft $hovercraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hovercraft $hovercraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hovercraft $hovercraft)
    {
        //
    }
}
