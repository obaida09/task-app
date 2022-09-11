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

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

Auth::routes();


Route::middleware(['isActive', 'auth'])->group(function ()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/communtiy'          , [HomeController::class            , 'communtiy'])->name('communtiy');
    Route::get('/communtiy/inActive' , [HomeController::class            , 'inActive'])->name('inActive');
    Route::get('remove-file/{id}'    , [SessionDetailsController::class  , 'remove_file'])->name('remove_file');
    Route::get('remove-post/{id}'    , [HomeController::class            , 'remove_from_communtiy'])->name('remove_from_communtiy');
    Route::get('accept-post/{id}'    , [HomeController::class            , 'accept_post_communtiy'])->name('accept_post_communtiy');
    Route::get('sub_category'        , [CategoryController::class        , 'sub_category'])->name('sub_category');
    
    Route::resource('healer'              , HealerController::class);
    Route::resource('patient'             , PatientController::class);
    Route::resource('session'             , SessionController::class);
    Route::resource('session_details'     , SessionDetailsController::class);
    Route::resource('category'            , CategoryController::class);
    Route::resource('pathological_case'   , PathologicalCaseController::class);
    
});