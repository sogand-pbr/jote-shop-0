<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;



Route::get('/', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('home');
Route::get('/product/{slug}', [\App\Http\Controllers\Web\ProductController::class, 'show'])
    ->name('product.show');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('products/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
});


require __DIR__.'/auth.php';
