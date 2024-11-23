<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenuesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

Route::controller(UserController::class)->prefix('/admin/users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
});

Route::controller(VenuesController::class)->prefix('/admin/venues')->name('venues.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
});

Route::controller(ActivityController::class)->prefix('/admin/activities')->name('activities.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BookingController::class)->prefix('/admin/bookings')->name('bookings.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(TagController::class)->prefix('/admin/tags')->name('tags.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(ContactController::class)->prefix('/admin/contacts')->name('contacts.')->group(function () {
    Route::get('/', 'index')->name('index');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
