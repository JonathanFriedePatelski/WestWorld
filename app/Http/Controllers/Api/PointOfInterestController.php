<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PointOfInterest;
use App\Http\Controllers\Controller;

class PointOfInterestController extends Controller
{
    public function index()
    {
        return PointOfInterest::all()->toJson();
    }
}
