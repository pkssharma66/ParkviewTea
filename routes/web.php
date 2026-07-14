<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerController;


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{slug}', [FrontendProductController::class, 'show'])
    ->name('product.details');

Route::get('/category/{slug}', [FrontendProductController::class, 'category'])
    ->name('category.products');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/shop', [FrontendProductController::class, 'index'])
    ->name('shop');


Route::middleware('guest')->group(function () {

    Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');

    Route::post('/login', [FrontendAuthController::class, 'authenticate'])->name('login.submit');

    Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');

    Route::post('/register', [FrontendAuthController::class, 'store'])->name('register.store');
});
Route::middleware('customer')->group(function () {

    Route::get('/profile', [FrontendAuthController::class, 'profile'])->name('profile');

    Route::post('/profile', [FrontendAuthController::class, 'update'])->name('profile.update');

    Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('logout');

    Route::get('/my-orders', [FrontendAuthController::class, 'orders'])->name('my.orders');
});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Guest Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('guest:admin')->group(function () {

        Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'authenticate'])->name('authenticate');

        Route::get('/forgot-password', [AdminAuthController::class, 'showForgotPasswordForm'])
            ->name('forgot.password');

        Route::post('/forgot-password', [AdminAuthController::class, 'sendResetLink'])
            ->name('forgot.password.send');

        Route::get('/reset-password/{token}', [AdminAuthController::class, 'showResetPasswordForm'])
            ->name('password.reset');

        Route::post('/reset-password', [AdminAuthController::class, 'resetPassword'])
            ->name('password.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Protected Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])
            ->name('logout');

        Route::get('/profile', [AdminController::class, 'profile'])
            ->name('profile');

        Route::post('/profile', [AdminController::class, 'updateProfile'])
            ->name('profile.update');

        Route::get('/change-password', [AdminController::class, 'changePassword'])
            ->name('change.password');

        Route::post('/change-password', [AdminController::class, 'updatePassword'])
            ->name('change.password.update');

        Route::get('settings', [SettingController::class, 'index'])
            ->name('settings');

        Route::post('settings', [SettingController::class, 'update'])
            ->name('settings.update');

        Route::resource('categories', CategoryController::class);

        Route::resource('products', AdminProductController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('orders', OrderController::class);
    });
});
