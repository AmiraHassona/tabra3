<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeneralRequestController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//Auth Routes start   
Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

//General Request Routes start
Route::controller(GeneralRequestController::class)->group(function () {
    Route::get('/blood-types', 'bloodTypes')->name('blood_types');
    Route::get('/governorates', 'governorates')->name('governorates');
    Route::get('/cities', 'cities')->name('cities');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/settings', 'settings')->name('settings');
    Route::post('/contact-us', 'contactUs')->name('contact_us');
});

