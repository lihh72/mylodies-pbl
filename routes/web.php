<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardAdminController;

Route::get('/q', function () {
    return view('welcome');
});

//Route::get('/home', function () {
//    return view('home');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// total 12 views ditambah /login dan /register yang sudah masuk ke auth dan sudah bekerja

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/edit', [EditUserController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/profileuser', [ProfileUserController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/search', [SearchController::class, 'index'])->name('search');

require __DIR__.'/auth.php';
