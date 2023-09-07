<?php

use App\Http\Controllers\Web;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::view('/', 'index');
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::resources([
            'crews' => Web\CrewController::class,
            'hovercraft' => Web\HovercraftController::class,
            'incidents' => Web\IncidentController::class,
            'pointsofinterest' => Web\PointOfInterestController::class,
        ]);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Web\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Web\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Web\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
