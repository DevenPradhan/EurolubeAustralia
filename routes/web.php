<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProductDetailController;
use App\Http\Controllers\User\ProductImageController;
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
Route::get('products.all', [VisitorController::class, 'productsAll'])->name('products.all');
Route::get('about-us', [VisitorController::class, 'aboutUs'])->name('about.us');
Route::get('news-blogs', [VisitorController::class, 'newsBlog'])->name('news.blogs');
Route::get('all-news', [VisitorController::class, 'allNews'])->name('all.news');
Route::get('contact-us', [VisitorController::class, 'contactUs'])->name('contact.us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('admin/products', ProductController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';