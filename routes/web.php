<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HealerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionDetailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PathologicalCaseController;


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


Route::middleware(['isActive', 'auth'])->group(function () 
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/communtiy', [HomeController::class, 'communtiy'])->name('communtiy');
    
    Route::resource('healer'              , HealerController::class);
    Route::resource('patient'             , PatientController::class);
    Route::resource('session'             , SessionController::class);
    Route::resource('session_details'     , SessionDetailsController::class);
    Route::resource('category'            , CategoryController::class);
    Route::resource('pathological_case'   , PathologicalCaseController::class);
    
    // Route::get('healer/show/{id}', [HealerController::class, 'show2'])->name('healer2.show');
    Route::get('sub_category', [CategoryController::class, 'sub_category'])->name('sub_category');
    Route::get('today', [SessionController::class, 'session_today'])->name('session.today');
});