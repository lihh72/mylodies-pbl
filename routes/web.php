<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/q', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/edit', function () {
    return view('edit-user');
});

Route::get('/riwayat', function () {
    return view('history');
});

Route::get('/profileuser', function () {
    return view('profile-user');
});

Route::get('/search', function () {
    return view('search');
    
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/dashboardadmin', function () {
    return view('dashboardadmin');
}); 

//Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
