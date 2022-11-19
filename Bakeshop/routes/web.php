<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StatisticsController; 
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RecentOrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('homepage');
});


Route::get('/OurMenu', function () {
    return view('clientmenu');
});

Route::get('/Contact', function () {
    return view('contact');
});


Route::get('/login/admin',[AdminController::class,'showLogin']);
Route::post('/login/admin',[AdminController::class,'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/profile', [UsersController::class, 'showProfile']);
Route::get('/register',[UsersController::class, 'showRegister']);
Route::post('/register',[UsersController::class, 'register']);
Route::get('/login/user',[UsersController::class,'register']);
Route::get('/logout', [UsersController::class, 'logout']);
Route::post('/login/user',[UsersController::class,'userLogin']);
Route::get('/login/user',[UsersController::class,'showLogin']);

Route::get('/Menu', [MenuController::class, 'showMenu']);
Route::post('/Menu', [MenuController::class, 'showCart']);
Route::post('/Menu/checkout', [MenuController::class, 'checkout']);
Route::get('/Menu/cart', [MenuController::class, 'showMyOrders']);

Route::get('/process_orders', [RecentOrdersController:: class, 'create']);
Route::post('/process_orders', [RecentOrdersController:: class, 'updateOrders']);

Route::get('/products/upload/{id}', [ProductsController::class, 'showUpload']);
Route::post('/products/upload/{id}', [ProductsController::class, 'uploadPhoto']);


Route:: resource('/admin/products', ProductsController::class);
Route:: resource('/admin/statistics', StatisticsController::class);
Route:: resource('/admin/orders', OrdersController::class);