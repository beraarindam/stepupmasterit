<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('web')->group(function () {
    // Admin Panel Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/login', [App\Http\Controllers\Backend\AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Backend\AdminAuthController::class, 'login'])->name('login.post');
        Route::post('/logout', [App\Http\Controllers\Backend\AdminAuthController::class, 'logout'])->name('logout');

        Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

            // Settings Routes
            Route::get('/settings', [App\Http\Controllers\Backend\SettingsController::class, 'index'])->name('settings.index');
            Route::post('/settings', [App\Http\Controllers\Backend\SettingsController::class, 'update'])->name('settings.update');

            // Services Routes
            Route::resource('services', App\Http\Controllers\Backend\ServiceController::class);

            // Courses Routes
            Route::resource('courses', App\Http\Controllers\Backend\CourseController::class);

            // Campus Routes
            Route::resource('campuses', App\Http\Controllers\Backend\CampusController::class);

            // Blogs Routes
            Route::resource('blogs', App\Http\Controllers\Backend\BlogController::class);

            // Galleries Routes
            Route::resource('galleries', App\Http\Controllers\Backend\GalleryController::class);

            // FAQs Routes
            Route::resource('faqs', App\Http\Controllers\Backend\FaqController::class);

            // Banners Routes
            Route::resource('banners', App\Http\Controllers\Backend\BannerController::class);

            // Testimonials Routes
            Route::resource('testimonials', App\Http\Controllers\Backend\TestimonialController::class);
        });
    });
});
