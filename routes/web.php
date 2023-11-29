<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\DashController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProductDetailController;
use App\Http\Controllers\User\ProductImageController;
use App\Http\Controllers\User\TypeController;
use App\Http\Controllers\Visitors\TestController;
use App\Http\Controllers\Visitors\ViewProductsController;
use App\Http\Controllers\Visitors\VisitorController;
use App\Http\Livewire\Admin\Orders;
use App\Http\Livewire\Admin\ProductCategories;
use App\Http\Livewire\Admin\Category\Details;
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
Route::prefix('Products')->group(function () {
    Route::get('/', [ViewProductsController::class, 'index'])->name('view_products');
    Route::get('/{category1}', [ViewProductsController::class, 'searchCategory1'])->name('searchCategory1');
    Route::get('/{category1}/{category2}', [ViewProductsController::class, 'searchCategory2'])->name('searchCategory2');
    Route::get('/{category1}/{category2}/{category3}', [ViewProductsController::class, 'searchCategory3'])->name('searchCategory3');
});

// Route::prefix('/Products')->group(function(){
//     Route::get('/', [TestController::class, 'index'])->name('view_products');
//     Route::get('/{category}', [TestController::class, 'category'])->name('category');
//     Route::get('/{category}/{subProduct}', [TestController::class, 'subProduct'])->name('subProduct');
//     Route::get('/{category}/{sub-product}/{product}', [TestController::class, 'product'])->name('getProduct');
// });

Route::get('/Product-details/{name}/', [ViewProductsController::class, 'productsEach'])->name('products-each');
Route::get('about-us', [VisitorController::class, 'aboutUs'])->name('about.us');
Route::get('news-blogs', [VisitorController::class, 'newsBlog'])->name('news.blogs');
Route::get('all-news', [VisitorController::class, 'allNews'])->name('all.news');
Route::get('contact-us', [VisitorController::class, 'contactUs'])->name('contact.us');
Route::get('services', [VisitorController::class, 'services'])->name('services');
Route::get('downloads', [VisitorController::class, 'downloads'])->name('downloads');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');
    Route::resource('admin/products', ProductController::class);
    Route::get('product-categories', ProductCategories::class)->name('product-categories');
    Route::get('product-categories/{category}/products', Details::class)->name('category-products');


    Route::get('orders', Orders::class)->name('orders');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';