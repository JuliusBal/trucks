<?php

use App\Http\Controllers\SubUnitController;
use App\Http\Controllers\TruckController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('trucks', TruckController::class)->except('show');
Route::resource('sub/units', SubUnitController::class)->only(['index', 'create', 'store', 'destroy']);
