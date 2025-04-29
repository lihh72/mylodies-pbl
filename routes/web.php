<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/landing', function () {
    return view('beranda');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/katalog', function () {
    return view('katalog');
});
Route::get('/cart', function () {
    return view('keranjang-salah-ngerjain-hhh');
});
Route::get('/edit', function () {
    return view('edit-user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
