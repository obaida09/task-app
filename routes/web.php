<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HealerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionDetailsController;
use App\Http\Controllers\CategoryController;


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

Auth::routes();


Route::group(['middleware' => 'isActive'], function () 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::resource('healer'          , HealerController::class);
    Route::resource('patient'         , PatientController::class);
    Route::resource('session'         , SessionController::class);
    Route::resource('session_details' , SessionDetailsController::class);
    Route::resource('category'        , CategoryController::class);
});