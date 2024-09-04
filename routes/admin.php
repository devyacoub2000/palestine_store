
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Auth;


Route::prefix(LaravelLocalization::setLocale())->middleware('auth', 'is_admin', 'verified')->group(function() {

  Route::prefix('admin')->name('admin.')->group(function() {
     
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);

});

});
