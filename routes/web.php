<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/index', [PointController::class, 'index'])->name('maps-index');
//Route::get('/points', [PointController::class, 'index'])->name('maps-index');
Route::get('/fetch-geoserver-data', [PointController::class, 'fetchGeoserverData'])->name('countryRegionDetail');

