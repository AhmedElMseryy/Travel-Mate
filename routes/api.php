<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\GuideController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\SearchDestinationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|--------------------------- API Routes
|--------------------------------------------------------------------------
*/


##----------------------------- AUTH MODULE
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

##----------------------------- USER MODULE
Route::get('/users', UserController::class);

##----------------------------- SETTINGS MODULE
Route::get('/settings', SettingController::class);

##----------------------------- DESTINATIONS MODULE
Route::get('/destinations', DestinationController::class);

##----------------------------- SEARCH DESTINATIONS MODULE
Route::get('/search', [SearchDestinationController::class, 'index']);

##----------------------------- RESERVATIONS MODULE
Route::get('/reservations', ReservationController::class);

##----------------------------- CONTACTS MODULE
Route::post('/contacts', ContactController::class);

##----------------------------- GUIDES MODULE
Route::get('/guides', GuideController::class);

##----------------------------- ABOUTS MODULE
Route::get('/abouts', AboutController::class);

##----------------------------- SUBSCRIBERS MODULE
Route::post('/subscribers', SubscriberController::class);
