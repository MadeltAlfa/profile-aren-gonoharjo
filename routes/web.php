<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController as PublicHomeController;
use App\Http\Controllers\Public\AboutController as PublicAboutController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\Public\ArtisanController as PublicArtisanController;
use App\Http\Controllers\Public\BusinessGroupController as PublicBusinessGroupController;
use App\Http\Controllers\Public\ContactController as PublicContactController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HomeContentController as AdminHomeContentController;
use App\Http\Controllers\Admin\AboutContentController as AdminAboutContentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ArtisanController as AdminArtisanController;
use App\Http\Controllers\Admin\BusinessGroupController as AdminBusinessGroupController;
use App\Http\Controllers\Admin\ContactInfoController as AdminContactInfoController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Sisi User)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicHomeController::class, 'index'])->name('home');
Route::get('/about', [PublicAboutController::class, 'index'])->name('about');
Route::get('/products', [PublicProductController::class, 'index'])->name('products');
Route::get('/artisans', [PublicArtisanController::class, 'index'])->name('artisans');
Route::get('/group', [PublicBusinessGroupController::class, 'index'])->name('group');
Route::get('/contact', [PublicContactController::class, 'index'])->name('contact');
Route::post('/contact/order', [PublicContactController::class, 'storeOrder'])->name('contact.order.store');

/*
|--------------------------------------------------------------------------
| Admin & Dashboard Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Stats Overview
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Profile Settings (Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Home Page Content Management
    Route::get('/admin/home', [AdminHomeContentController::class, 'edit'])->name('admin.home.edit');
    Route::post('/admin/home/update', [AdminHomeContentController::class, 'update'])->name('admin.home.update');

    // About Us Content Management
    Route::get('/admin/about', [AdminAboutContentController::class, 'edit'])->name('admin.about.edit');
    Route::post('/admin/about/update', [AdminAboutContentController::class, 'update'])->name('admin.about.update');

    // Business Group Profile & Structure
    Route::get('/admin/group', [AdminBusinessGroupController::class, 'edit'])->name('admin.group.edit');
    Route::post('/admin/group/update', [AdminBusinessGroupController::class, 'update'])->name('admin.group.update');

    // Contact Details, Location & Working Hours
    Route::get('/admin/contact', [AdminContactInfoController::class, 'edit'])->name('admin.contact.edit');
    Route::post('/admin/contact/update', [AdminContactInfoController::class, 'update'])->name('admin.contact.update');

    // Orders Management
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');

    // Resource CRUD for Products, Artisans, and Admin Users
    Route::resource('/admin/products', AdminProductController::class)->names('products');
    Route::resource('/admin/artisans', AdminArtisanController::class)->names('artisans');
    Route::resource('/admin/users', AdminUserController::class)->names('users');
});

require __DIR__.'/auth.php';
