<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InsidencesController;
use App\Http\Controllers\TrainerController;
use App\Models\Insidences;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('insidences', InsidencesController::class);
Route::resource('Admin',AdminController::class);
Route::resource('trainer',TrainerController::class);
