<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenuesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Users Management
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{id}', 'show')->name('show');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
        Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
    });

    // Venues Management
    Route::controller(VenuesController::class)->prefix('venues')->name('venues.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::post('storeTags', 'storeTags')->name('storeTags');
        Route::get('show/{id}', 'show')->name('show');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
    });

    // Activities Management
    Route::controller(ActivityController::class)->prefix('activities')->name('activities.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{id}', 'show')->name('show');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
    });

    // Bookings Management
    Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{id}', 'show')->name('show');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::patch('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
        Route::patch('{id}/update-status', 'updateStatus')->name('update-status');
    });

    // Tags Management
    Route::controller(TagController::class)->prefix('tags')->name('tags.')->group(function () {
        Route::get('/', 'index')->name('index'); // Display list of tags
        Route::get('create', 'create')->name('create'); // Show create tag form
        Route::post('store', 'store')->name('store'); // Store new tag
        Route::get('show/{id}', 'show')->name('show'); // Show specific tag details
        Route::get('edit/{id}', 'edit')->name('edit'); // Show edit form
        Route::patch('update/{id}', 'update')->name('update'); // Update tag
        Route::delete('delete/{id}', 'destroy')->name('destroy'); // Delete tag
    });


    // Contacts Management
    Route::controller(ContactController::class)->prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('show/{id}', 'show')->name('show');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
        Route::patch('{id}/update-status', 'updateStatus')->name('update-status');
    });



    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('show/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });



    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
        Route::get('password', 'passEdit')->name('passEdit');
    });
});

Route::get('/home', [HomeController::class, 'showCategories'])->name('show.category');

// Route::get('/home', function () {
//     return view('user.home');
// })->name('user.home');
Route::get('/about', function () {
    return view('user.about');
})->name('user.about');
Route::get('/venues', function () {
    return view('user.venues');
})->name('user.venues');
Route::get('/venue', function () {
    return view('user.single-venue');
})->name('user.venue');
Route::get('/contact', function () {
    return view('user.contact');
})->name('user.contact');
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
