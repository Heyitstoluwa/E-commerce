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
Route::match(['get'], '/my-orders', [App\Http\Controllers\UserController::class, 'orders'])->name('my-orders')->middleware('user');
Route::post('/account-login', [App\Http\Controllers\UserController::class, 'login'])->name('account.login');
Route::get('/account-logout', [App\Http\Controllers\UserController::class, 'logout'])->name('account.logout');

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::group(['middleware' => ['admin', 'auth']], function () {
//         Route::get('/',  [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
//     });
// });

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

        Route::get('/sub-admin',  [App\Http\Controllers\Admin\SubAdminController::class, 'index'])->name('sub_admin');
        Route::match(['get', 'post'], '/create-sub-admin',  [App\Http\Controllers\Admin\SubAdminController::class, 'create'])->name('sub_admin.create')->middleware('admin_only');
        Route::match(['get'], '/delete-sub-admin/{id}',  [App\Http\Controllers\Admin\SubAdminController::class, 'delete'])->name('sub_admin.delete')->middleware('admin_only');

        //Users
        Route::get('/users',  [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
        Route::get('/user/{id}',  [App\Http\Controllers\Admin\UserController::class, 'view'])->name('user');;

        //Vendors
        Route::get('/vendors',  [App\Http\Controllers\Admin\VendorController::class, 'index'])->name('vendors')->middleware('sub_admin_user');;
        Route::get('/vendor/{id}',  [App\Http\Controllers\Admin\VendorController::class, 'view'])->name('vendor')->middleware('sub_admin_user');;
        Route::get('/vendor/acc/{id}/{type}/{mode}',  [App\Http\Controllers\Admin\VendorController::class, 'lock_unlock'])->name('vendor.lock_unlock')->middleware('sub_admin_user');;

        Route::get('/library',  [App\Http\Controllers\Admin\MaterialController::class, 'library'])->name('library')->middleware('sub_admin_mat');
        Route::match(['get', 'post'], '/upload',  [App\Http\Controllers\Admin\MaterialController::class, 'upload'])->name('upload')->middleware('sub_admin_mat');
        Route::match(['get', 'post'], '/edit/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'edit'])->name('edit.library')->middleware('sub_admin_mat');
        Route::match(['get'], '/library/view/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view'])->name('view.library')->middleware('sub_admin_mat');
        Route::match(['get'], '/library/delete/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'delete'])->name('delete.library')->middleware('sub_admin_mat');


        Route::get('/transactions',  [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions')->middleware('sub_admin_trans');
        Route::get('/transactions/{id}',  [App\Http\Controllers\Admin\TransactionController::class, 'view'])->name('transaction.view')->middleware('sub_admin_trans');
        Route::match(['get', 'post'], '/settings',  [App\Http\Controllers\Admin\DashboardController::class, 'settings'])->name('settings')->middleware('admin_only');
        Route::match(['get', 'post'], '/profile',  [App\Http\Controllers\Admin\DashboardController::class, 'profile'])->name('profile')->middleware('admin_only');
        Route::match(['get', 'post'], '/sub',  [App\Http\Controllers\Admin\DashboardController::class, 'sub_admin_profile'])->name('sub_admin_profile');

        // Material Type
        Route::match(['get', 'post'], '/add_material',  [App\Http\Controllers\Admin\MaterialController::class, 'add_material'])->name('add_material')->middleware('sub_admin_mat');
        Route::match(['get'], '/view_material/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view_material'])->name('view_material')->middleware('sub_admin_mat');
        Route::get('/delete_material/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'delete_material'])->name('delete_material')->middleware('sub_admin_mat');
        Route::get('/view_material/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view_material'])->name('view_material')->middleware('sub_admin_mat');
        // Route::get('/update_material_status/{id}/{value}',  [App\Http\Controllers\Dashboard\AdminController::class, 'update_material_status'])->name('update_material_status');

        Route::get('/test',  [App\Http\Controllers\Dashboard\AdminController::class, 'test'])->name('test');

        // Subject Type
        Route::match(['get', 'post'], '/add_subject',  [App\Http\Controllers\Admin\MaterialController::class, 'add_subject'])->name('add_subject')->middleware('admin_only');
        Route::match(['get'], '/view_subject/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view_subject'])->name('view_subject')->middleware('admin_only');
        Route::get('/delete_subject/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'delete_subject'])->name('delete_subject')->middleware('admin_only');

        //Folder
        Route::match(['get', 'post'], 'add_folder',  [App\Http\Controllers\Admin\MaterialController::class, 'add_folder'])->name('add_folder')->middleware('sub_admin_mat');
        Route::match(['get', 'post'], 'edit_folder/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'edit_folder'])->name('edit_folder')->middleware('sub_admin_mat');
        Route::match(['get'], 'folders',  [App\Http\Controllers\Admin\MaterialController::class, 'folders'])->name('folders')->middleware('sub_admin_mat');
        Route::match(['get'], 'view_folder/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view_folder'])->name('view_folder')->middleware('sub_admin_mat');


        //FAQ
        Route::match(['get', 'post'], '/add_faq',  [App\Http\Controllers\Admin\FAQController::class, 'add_faq'])->name('add_faq')->middleware('admin_only');
        Route::match(['get'], '/view_faq/{id}',  [App\Http\Controllers\Admin\FAQController::class, 'view_faq'])->name('view_faq')->middleware('admin_only');
        Route::get('/delete_faq/{id}',  [App\Http\Controllers\Admin\FAQController::class, 'delete_faq'])->name('delete_faq')->middleware('admin_only');

        //Subscription
        Route::match(['get', 'post'], '/edit_subscription/{id}',  [App\Http\Controllers\Admin\SubscriptionController::class, 'edit_subscription'])->name('edit_subscription')->middleware('admin_only');
        Route::match(['get'], '/view_subscription/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'view_subscription'])->name('view_subscription')->middleware('admin_only');
        Route::get('/delete_subscription/{id}',  [App\Http\Controllers\Admin\MaterialController::class, 'delete_subscription'])->name('delete_subscription')->middleware('admin_only');
        // Route::get('/update_subject_status/{id}/{value}',  [App\Http\Controllers\Admin\SubscriptionController::class, 'update_subject_status'])->name('update_subject_status');

        //Messages
        Route::match(['get', 'post'], '/messages',  [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages')->middleware('sub_admin_chat');
        Route::match(['post'], '/current_msg_user',  [App\Http\Controllers\Admin\MessageController::class, 'current_msg_user'])->name('current_msg_user')->middleware('sub_admin_chat');
        Route::match(['post'], '/send_msg',  [App\Http\Controllers\Admin\MessageController::class, 'send_msg'])->name('send_msg')->middleware('sub_admin_chat');
    });
});