<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
Route::get('/courses', [App\Http\Controllers\HomeController::class, 'courses'])->name('courses');
Route::get('/course/{slug}', [App\Http\Controllers\HomeController::class, 'courseDetails'])->name('course.details');
Route::get('/category/{slug}', [App\Http\Controllers\HomeController::class, 'categoryCourses'])->name('category.courses');
Route::get('/service/{slug}', [App\Http\Controllers\HomeController::class, 'serviceDetails'])->name('service.details');
Route::get('/campus', [App\Http\Controllers\HomeController::class, 'campus'])->name('campus');
Route::get('/sitemap', [App\Http\Controllers\HomeController::class, 'sitemap'])->name('sitemap');

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
            Route::resource('course-categories', App\Http\Controllers\Backend\CourseCategoryController::class);
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

            // Page Management Routes
            Route::prefix('pages')->name('pages.')->group(function () {
                Route::get('/home', [App\Http\Controllers\Backend\PageController::class, 'home'])->name('home');
                Route::post('/home', [App\Http\Controllers\Backend\PageController::class, 'homeUpdate'])->name('home.update');
                Route::get('/about', [App\Http\Controllers\Backend\PageController::class, 'about'])->name('about');
                Route::post('/about', [App\Http\Controllers\Backend\PageController::class, 'aboutUpdate'])->name('about.update');

                // Generic routes for other pages
                Route::get('/{page}', [App\Http\Controllers\Backend\PageController::class, 'index'])->name('index');
                Route::post('/{page}', [App\Http\Controllers\Backend\PageController::class, 'update'])->name('update');
            });
        });
    });
});
