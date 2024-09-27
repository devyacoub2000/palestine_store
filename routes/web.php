<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FrontController;
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

            Route::get('/dashboard', function () {
            return view('dashboard');
            })->middleware(['auth', 'verified'])->name('dashboard');

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
          });  














