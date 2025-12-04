<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminUserController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Projects / Portfolio
Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Testimonials
Route::get('/temoignages', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/temoignages/nouveau', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/temoignages', [TestimonialController::class, 'store'])->name('testimonials.store');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Appointments
Route::get('/rendez-vous', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/rendez-vous', [AppointmentController::class, 'store'])->name('appointments.store');

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Services Management
    Route::resource('services', AdminServiceController::class);

    // Projects Management
    Route::resource('projects', AdminProjectController::class);

    // Blog Posts Management
    Route::resource('blog', AdminBlogController::class);

    // Testimonials Management
    Route::resource('testimonials', AdminTestimonialController::class);

    // Contacts Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Appointments Management
    Route::get('appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}/edit', [AdminAppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AdminAppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Users Management
    Route::resource('users', AdminUserController::class);
    Route::patch('users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
