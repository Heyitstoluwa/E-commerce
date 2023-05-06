<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/carts', [App\Http\Controllers\HomeController::class, 'carts'])->name('carts');
Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::match(['get', 'post'], '/account', [App\Http\Controllers\UserController::class, 'index'])->name('account')->middleware('user');
Route::match(['get', 'post'], '/change-password', [App\Http\Controllers\UserController::class, 'password'])->name('password')->middleware('user');
Route::match(['get'], '/my-carts', [App\Http\Controllers\UserController::class, 'my_carts'])->name('my-carts')->middleware('user');
Route::match(['get'], '/orders', [App\Http\Controllers\UserController::class, 'orders'])->name('orders')->middleware('user');
Route::match(['get'], '/order/{id}', [App\Http\Controllers\UserController::class, 'order'])->name('order')->middleware('user');
Route::match(['post'], '/save-order', [App\Http\Controllers\UserController::class, 'save_order'])->name('save-order')->middleware('user');
Route::post('/account-login', [App\Http\Controllers\UserController::class, 'login'])->name('account.login');
Route::get('/account-logout', [App\Http\Controllers\UserController::class, 'logout'])->name('account.logout');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::match(['get', 'post'], '/login',  [App\Http\Controllers\Admin\DashboardController::class, 'login'])->name('login');

    Route::group(['middleware' => ['admin', 'auth']], function () {
        Route::get('/',  [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
        //Sub admins
        Route::get('/products',  [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
        Route::match(['get', 'post'], '/add-product',  [App\Http\Controllers\Admin\ProductController::class, 'add'])->name('add_product');
        Route::match(['get', 'post'], '/edit-product/{id}',  [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit_product');
        Route::match(['get'], '/delete-product/{id}',  [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete_product');
        Route::match(['get'], '/view-product/{id}',  [App\Http\Controllers\Admin\ProductController::class, 'view'])->name('view_product');

        //Users
        Route::get('/users',  [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
        Route::get('/user/{id}',  [App\Http\Controllers\Admin\UserController::class, 'view'])->name('user');;

        Route::get('/orders',  [App\Http\Controllers\Admin\DashboardController::class, 'orders'])->name('orders');
        Route::get('/order/{id}',  [App\Http\Controllers\Admin\DashboardController::class, 'order'])->name('order');
        Route::get('/transactions',  [App\Http\Controllers\Admin\DashboardController::class, 'transactions'])->name('transactions');

        Route::match(['get', 'post'], '/update-password',  [App\Http\Controllers\Admin\DashboardController::class, 'password'])->name('password');
        Route::match(['get', 'post'], '/settings',  [App\Http\Controllers\Admin\DashboardController::class, 'settings'])->name('settings');
        Route::match(['get', 'post'], '/profile',  [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile');

    });
});