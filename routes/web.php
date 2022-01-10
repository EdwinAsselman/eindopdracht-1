<?php

use Illuminate\Support\Facades\Route;

/** BAND CONTROLLERS */
use App\Http\Controllers\Bands\BandsController;
use App\Http\Controllers\Bands\EditBandController;
use App\Http\Controllers\Bands\CreateBandController;
use App\Http\Controllers\Bands\BandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect to bands route.
Route::get('/', function () {
    return redirect()->route('bands');
});

// BANDS
Route::prefix('/bands')->group(function () {

    // Render the list for bands.
    Route::get('/', [ BandsController::class, 'render' ])
        ->name('bands');
    
    Route::middleware(['middleware' => 'auth'])->group(function () {

        // Render form for bands in create mode.
        Route::get('create', [ CreateBandController::class, 'render' ])
            ->name('create.band');
    });

    // BAND DETAILS
    Route::prefix('{bandId}')->group(function () {

        // Render the details for a band.
        Route::get('/details', [ BandController::class, 'render' ])
            ->name('band.details');

        Route::middleware(['middleware' => 'auth'])->group(function () {

            // Render the form view in edit mode for bands.
            Route::get('edit', [ EditBandController::class, 'render' ])
                ->name('band.edit');
        });
        
    });

});
