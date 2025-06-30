<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User Routes (regular users can access these)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Categories Management
    Route::resource('categories', CategoryController::class)->except(['show']);
    
    // Product Management
    Route::resource('products', ProductController::class);
    
    // Order Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/orders/{order}/approve', [AdminController::class, 'approveOrder'])->name('admin.orders.approve');
    Route::post('/orders/{order}/decline', [AdminController::class, 'declineOrder'])->name('admin.orders.decline');
});


//Admin Login Info
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'adminLogin')->name('admin.login');
    Route::get('/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
    Route::get('admin/logout', 'adminLogout')->name('admin.logout'); 
    Route::post('/login', 'login')->name('admin.login.submit');
}); 

// Customer Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Order Routes
    Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders.show', [OrderController::class, 'show'])->name('orders.show');
});

// Public Routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');



