<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\TypeController;
use App\Http\Controllers\Visitors\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [VisitorController::class, 'index'])->name('/');
Route::get('/products', [VisitorController::class, 'products'])->name('view_products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::post('user/products/categories/upload.images/{id}', [ImagesController::class, 'uploadCategory'])->name('category.image.upload');
    Route::post('user/products/types/upload.images/{id}', [ImagesController::class, 'uploadType'])->name('type.image.upload');

    Route::get('user/products', [ProductController::class, 'index'])->name('products');
    Route::post('user/products', [ProductController::class, 'add_product'])->name('products.add');
    Route::get('user/products/details/{id}', [ProductController::class, 'details'])->name('product.details');

    Route::get('user/products/types', [TypeController::class, 'index'])->name('types');
    Route::post('user/products/types', [TypeController::class, 'add_type'])->name('type.add');
    Route::patch('user/products/types', [TypeController::class, 'edit'])->name('type.edit');
    Route::get('user/products/types/{id}', [TypeController::class, 'detail'])->name('type.details');
    Route::patch('user/products/types/{id}/description', [TypeController::class, 'putDescription'])->name('type-description-edit');

    Route::get('user/products/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('user/products/categories', [CategoryController::class, 'add_category'])->name('category.add');
    Route::patch('user/products/categories', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('user/products/categories.destroy/{id}', [CategoryController::class, 'destroy_category'])->name('category.destroy');
    Route::get('user/products/categories/{id}', [CategoryController::class, 'detail'])->name('category.details');
    Route::patch('user/products/categories/{id}/description', [CategoryController::class, 'putDescription'])->name('category-description-edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';