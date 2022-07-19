<?php

use App\Http\Livewire\Admin\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/product', 'product');
    Route::get('/cart', 'cart');
    Route::get('/checkout', 'checkout');
    Route::get('/my-account', 'myAccount');
    Route::get('/wishlist', 'wishlist');
    Route::get('/login-user', 'login');
    Route::get('/contact', 'contact');
});

Auth::routes();



Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    // category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    // product routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');

        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::get('exportPdf', 'exportPdf');
        Route::get('exportExcel', 'exportExcel');
    });

    Route::get('/brands', Brand\Index::class);

    Route::controller(ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
    });
    // category routes
    // Route::get('category', [CategoryController::class, 'index']);
    // Route::get('category/create', [CategoryController::class, 'create']);
    // Route::post('category', [CategoryController::class, 'store']);
});

Route::get('/browser', [Controller::class, 'index']);
// Route::get('/category/tes', [Controller::class, 'category']);
