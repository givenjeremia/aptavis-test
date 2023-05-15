<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\KlasemenController;

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

Route::get('/', [KlasemenController::class,'index']);

// Route::resource('klasemen',KlasemenController::class);
Route::resource('score',ScoreController::class);
Route::resource('klub',KlubController::class);

