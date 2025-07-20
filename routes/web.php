<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    LandingController,
    PaymentController,
    CatalogController,
    CartController,
    EditUserController,
    HistoryController,
    ProfileUserController,
    SearchController,
    ProductController,
    DashboardAdminController,
    OrderController,
    SettingsController,
    OauthController,
    OrderDetailController,
    ProductReviewController,
    FonnteWebhookController,
    OtpController
};

// === Webhooks ===
Route::match(['get', 'post'], '/webhook/fonnte', [FonnteWebhookController::class, 'handle']);

// === Guest Routes ===
Route::get('/', [ProductController::class, 'index'])->name('landing');
Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');
Route::get('/profileuser', [ProfileUserController::class, 'index']);
Route::get('/about', fn() => view('pages.about'));
Route::get('/nonton', fn() => view('backup.squidgame'));
Route::get('/q', fn() => view('backup.welcome'));

// === Payment Routes ===
Route::match(['get', 'post'], '/payment/process/{order}', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/payment/{code}', [PaymentController::class, 'show'])->name('payment.show')->middleware('auth');
Route::post('/payment/address/{code}', [PaymentController::class, 'confirmAddress'])->name('payment.address.confirm');
Route::get('/payment/confirm/{code}', [PaymentController::class, 'confirm'])->name('payment.confirm');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/invoice/{order}', [PaymentController::class, 'showInvoice'])->name('invoice.show');

// === Authenticated User Routes ===
Route::middleware('auth')->group(function () {

    // OTP
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // Dashboard & Settings
    Route::get('/dashboard', fn() => view('backup.dashboard'))->name('dashboard');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/address', [SettingsController::class, 'editAddress'])->name('address.edit');
    Route::put('/address', [SettingsController::class, 'updateAddress'])->name('address.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Edit User
    Route::get('/edit', [EditUserController::class, 'index']);
    Route::post('/edit/password', [EditUserController::class, 'updatePassword'])->name('edit.password');

    // Cart
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{productId}', [CartController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CartController::class, 'updateQuantity'])->name('update');
        Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('delete');
    });

    // History & Orders
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::post('/history/repeat/{id}', [HistoryController::class, 'repeat'])->name('order.repeat');

    Route::post('/products/{product}/order', [OrderController::class, 'storeSingle'])->name('order.store');
    Route::post('/order/from-cart', [OrderController::class, 'storeFromCart'])->name('order.storeFromCart');
    Route::get('/order/{order}', [OrderDetailController::class, 'show'])->name('order.detail');

    // Reviews
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/create/{order_item}', [ProductReviewController::class, 'create'])->name('create');
        Route::post('/store/{order_item}', [ProductReviewController::class, 'store'])->name('store');
    });
});

// === Admin Dashboard ===
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index']);

// === OAuth ===
Route::get('oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');
Route::get('oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

// === Auth Routes ===
require __DIR__ . '/auth.php';
