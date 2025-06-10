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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\OauthController;
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

Route::get('/', [ProductController::class, 'index'])->name('landing');
Route::match(['get', 'post'], '/payment/process/{order}', [PaymentController::class, 'process'])->name('payment.process');

Route::get('/payment/{code}', [PaymentController::class, 'show'])->name('payment.show')->middleware('auth');

Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');


Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');
});

Route::get('/edit', [EditUserController::class, 'index'])->middleware('auth');
Route::post('/edit/password', [EditUserController::class, 'updatePassword'])->name('edit.password')->middleware('auth');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/profileuser', [ProfileUserController::class, 'index']);
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/order', [OrderController::class, 'storeSingle'])->name('order.store');
    Route::post('/order/from-cart', [OrderController::class, 'storeFromCart'])->name('order.storeFromCart');
});

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index')->middleware('auth');
Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update')->middleware('auth');


Route::get('/about', function () {
    return view('about');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

//Route::get('/search', [SearchController::class, 'index'])->name('search');

require __DIR__.'/auth.php';
