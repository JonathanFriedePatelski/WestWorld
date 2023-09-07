<?php

use App\Http\Controllers\Api\PointOfInterestController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\IncidentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')
//     ->group(function () {
Route::get('/user', fn (Request $request) => $request->user());
Route::get('/pointsofinterest', [PointOfInterestController::class, 'index']);
Route::post('/incidents/store', [IncidentController::class, 'store']);
Route::get('/incidents', [IncidentController::class, 'index']);
// });
