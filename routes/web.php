<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix(LaravelLocalization::setLocale())->group(function() {

            Route::get('/', [FrontController::class, 'index'])->name('front.index');
            Route::get('about-us', [FrontController::class, 'about'])->name('front.about');
            Route::get('products', [FrontController::class, 'products'])->name('front.products');
            Route::get('contact-us', [FrontController::class, 'contact'])->name('front.contact');

            Route::get('category/{id}', [FrontController::class, 'category'])->name('front.category');
            Route::get('products/{id}', [FrontController::class, 'single_product'])->name('front.single_product');

            Route::get('/index', [FrontController::class, 'index'])->middleware(['auth'])->name('front.index');

            // Route::get('/index', [FrontController::class, 'index'])->middleware(['auth', 'verified'])->name('front.index');

            Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            });

            require __DIR__.'/auth.php';

            // API test

            Route::get('old_products', [APIController::class, 'products']);
            Route::get('weather', [APIController::class, 'weather']);

            // test Notification 

            Route::get('send', [NotificationController::class, 'send']);

            Route::post('/products/{id}/reviews', [ReviewController::class, 'store_rate'])->name('front.store_rate');

            Route::post('store_cart/{id}', [CartController::class, 'store_cart'])->name('front.store_cart');

            Route::get('mycart', [CartController::class, 'mycart'])->name('front.mycart');
            Route::delete('remove_cart/{id}', [CartController::class, 'remove'])->name('front.remove');

            // make Order

            Route::post('create_order', [OrderController::class, 'create_order'])->name('front.create_order');

            
          });  














