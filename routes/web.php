<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\FavoriteController;
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



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/user', [HomeController::class, 'nav'])->name('home.nav');

Route::get('/detail/{id}', [HomeController::class, 'show'])->name('detail');
Route::get('/products', [HomeController::class, 'products'])->name('home.products');
Route::get('/sort', [HomeController::class, 'sort'])->name('sort');
Route::get('/products/category/{name}', [HomeController::class, 'productsByCategory'])->name('products.category');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// ------------------------------------------favorites--------------------------------------- 
Route::get('/favorites', [FavoriteController::class, 'index'])->name('home.favorite');
Route::post('/favorites/add', [FavoriteController::class, 'add'])->name('favorites.add');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');

// ------------------------------------------login--------------------------------------- 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ------------------------------------------search--------------------------------------- 
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// ------------------------------------------order--------------------------------------- 
Route::get('/order/information', [OrderController::class, 'information'])->name('order.information');
Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::get('/orders/{order_id}/review/{product_id}', [OrderController::class, 'showReviewForm'])->name('order.review');
Route::post('/orders/{order_id}/review/{product_id}', [OrderController::class, 'submitReview'])->name('orders.submitReview');


// --------------------------cart---------------------------------
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/check', [CartController::class, 'check'])->name('cart.check');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');














// -------------------------------adminn-------------------------------------------------------
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

// ----------------------role=========================================================================>>
    Route::get('/assign-role', [UsersController::class, 'showAssignRoleForm'])->name('role-form');
    Route::post('/assign-role', [UsersController::class, 'assignRole'])->name('role');

// ----------------------user=========================================================================>>
Route::get('/users', [UsersController::class, 'index_user'])->name('index_user');
Route::get('/users/{id}/edit', [UsersController::class, 'edit_user'])->name('edit_user');
Route::put('/users/{id}', [UsersController::class, 'update_user'])->name('update_user');

// ----------------------category=========================================================================>>
    Route::get('/categories', [CategoryController::class, 'index'])->name('index_category');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('insert_category');
    Route::post('/categories', [CategoryController::class, 'store'])->name('store_category');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ----------------------product=========================================================================>>
    Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/store', [ProductController::class, 'store_product'])->name('products.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update_product'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/admin_search', [ProductController::class, 'admin_search'])->name('admin_search');

// ----------------------order=========================================================================>>

Route::get('/orders', [OrderController::class, 'orders'])->name('orders.index');
Route::put('/update/status/{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');

// ----------------------chart=========================================================================>>
Route::get('/sales-by-day', [ChartController::class, 'salesByDay'])->name('chart.sales_by_day');

// ----------------------contact=========================================================================>>
Route::get('/contact', [ContactController::class, 'index'])->name('index_contact');
Route::put('/update/contact/{id}', [ContactController::class, 'updateContact'])->name('updateContact');

});