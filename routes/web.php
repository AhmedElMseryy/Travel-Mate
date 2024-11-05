<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

#******************************************** TEST
// Route::middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->prefix(LaravelLocalization::setLocale())->group(function () {
//     Route::view('/', 'admin.index');
// });
// Route::get('/', function () {
//     return view('front_auth.login');
// });


Route::resource('reservations', ReservationController::class);
##************************************************** FRONT ROUTES
Route::name('front.')->controller(FrontController::class)->group(function () {
    //============================== HOME PAGE
    Route::post('subscriber/store', 'subscriberStore')->name('subscriber.store');
    Route::get('', 'index')->name('index');

    //============================== ABOUT PAGE
    Route::get('/about', 'about')->name('about');

    //============================== DESTINATIONS PAGE
    Route::get('/destination', 'destination')->name('destination');

    //============================== Reservation Submit 
    Route::post('/reservation', 'reservation')->name('reservation.submit');

    //============================== CONTACT PAGE
    Route::post('contact/store', 'contactStore')->name('contact.store');
    Route::get('/contact', 'contact')->name('contact');
});
require __DIR__ . '/auth.php';

##************************************************** ADMIN ROUTES
Route::name('admin.')->prefix(LaravelLocalization::setLocale() . '/admin')->middleware(
    'localeSessionRedirect',
    'localizationRedirect',
    'localeViewPath'
)->group(function () {

    Route::middleware(['admin'])->group(function () {
        //============================== HOME PAGE
        Route::view('', 'admin.master')->name('index');

        //============================== DESTINATIONS
        Route::controller(DestinationController::class)->group(function () {
            Route::resource('destinations', DestinationController::class);
        });
        //============================== FEATURES
        Route::controller(GuideController::class)->group(function () {
            Route::resource('guides', GuideController::class);
        });
        //============================== CONTACTS
        Route::controller(ContactController::class)->group(function () {
            Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
        });
        //============================== SUBSCRIBERS
        Route::controller(SubscribeController::class)->group(function () {
            Route::resource('subscribers', SubscribeController::class)->only(['index', 'destroy']);
        });
        //============================== ABOUT SECTION
        Route::controller(AboutController::class)->group(function () {
            Route::resource('about', AboutController::class)->only(['index', 'edit', 'update']);
        });
    });
    require __DIR__ . '/adminAuth.php';
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });