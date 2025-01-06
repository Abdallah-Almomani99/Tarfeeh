<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\AdminController\TagController;


use App\Http\Controllers\UserController\HomeController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\UserController\AboutController;
use App\Http\Controllers\AdminController\VenuesController;
use App\Http\Controllers\AdminController\BookingController;
use App\Http\Controllers\AdminController\ContactController;
use App\Http\Controllers\AdminController\ProfileController;
use App\Http\Controllers\AdminController\ActivityController;

use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\VenueController\VenueDataController;
use App\Http\Controllers\UserController\UserProfileController;
use App\Http\Controllers\VenueController\VenueProfileController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin Dashboard


    Route::controller(HeroSlideController::class)->prefix('heroSlider')->name('heroSlider.')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::delete('delete/{heroSlide}', 'destroy')->name('destroy');
    });

    Route::controller(DashboardController::class)->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/dashboard', 'index')->name('index');
    });

    // Admin Users Management
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/admins', 'admins')->name('admin.index');
        Route::get('/venues', 'venues')->name('venue.index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{id}', 'show')->name('show');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
        Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
    });

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
        Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
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

/*
|--------------------------------------------------------------------------
| Venue Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'venue'])->prefix('venue')->name('venue.')->group(function () {
    Route::controller(VenueProfileController::class)->group(function () {
        // dd();
        Route::get('create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/details', 'showVenueDetails')->name('details');

        Route::get('/details/edit', 'edit')->name('edit.details');
        Route::patch('/details/update', 'update')->name('update.details');

        // Activity 
        Route::get('/create/activity', 'createActivity')->name('create.activity');
        Route::post('/store/activity', 'storeActivity')->name('store.activity');
        Route::get('/activities', 'showActivitiesPage')->name('activities');
        Route::get('edit/{id}', 'editActivity')->name('edit.activity');
        Route::patch('update/{id}', 'updateActivity')->name('update.activity');
        Route::delete('/activity/{id}',  'destroyActivity')->name('activity.destroy');

        Route::get('/bookings', 'bookings')->name('bookings');
        Route::put('/bookings/{booking}', 'updateBookingStatus')->name('update-booking-status');

        Route::get('/profile/{id}', 'showVenueProfile')->name('profile.show');
    });

    Route::controller(VenueDataController::class)->prefix('profile1')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
        Route::get('password', 'passEdit')->name('passEdit');
    });
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/


Route::controller(UserProfileController::class)->prefix('profile1')->name('user.profile.')->group(function () {
    Route::get('/', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
    Route::get('password', 'passEdit')->name('passEdit');
});

Route::post('/contact/store', [HomeController::class, 'storeMessage'])->name('contact.store');

// Route::middleware(['auth', 'user'])->group(function () {});
Route::get('/venues', [HomeController::class, 'showVenues'])->name('venues.page');
Route::post('/nearest-venues', [HomeController::class, 'getNearestVenues'])->name('nearest.venues');

Route::post('/user-booking', [HomeController::class, 'bookingCreate'])->name('user.bookings');

Route::get('/category/{id}', [HomeController::class, 'venueCategoryPage'])->name('venue.category');
Route::post('/nearest-category', [HomeController::class, 'venueCate'])->name('category.venues');


Route::get('/home', [HomeController::class, 'showCategories'])->name('show.category');
Route::get('/', [HomeController::class, 'showCategories'])->name('show.category');
Route::get('/venue/{id}', [HomeController::class, 'show'])->name('show.venue');
Route::post('/venues/filter', [HomeController::class, 'filter'])->name('venues.filter');

// Route::get('/home', function () {
//     return view('user.home');
// })->name('user.home');
Route::get('/about', [AboutController::class, 'index'])->name('user.about');

// Route::get('/venues', function () {
//     return view('user.venues');
// })->name('user.venues');
Route::get('/venue', function () {
    return view('user.single-venue');
})->name('user.venue');
Route::get('/contact', function () {
    return view('user.contact');
})->name('user.contact');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/





require __DIR__ . '/auth.php';
