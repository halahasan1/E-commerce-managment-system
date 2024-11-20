<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin_ProductController;
use App\Http\Controllers\Admin_CategoryController;
use App\Http\Controllers\UsersController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Protect these routes with AdminMiddleware
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    //delete,restore and force delete routes
    Route::get('products/deleted', [Admin_ProductController::class, 'deleted'])->name('products.deleted');
    Route::post('products/restore/{id}', [Admin_ProductController::class, 'restore'])->name('products.restore');
    Route::DELETE('products/force/delete/{id}', [Admin_ProductController::class, 'forceDelete'])->name('products.force.delete');
    
    // Manage Products
    Route::resource('/admin/products', Admin_ProductController::class); 

    // Manage Categories
    Route::resource('/admin/categories', Admin_CategoryController::class)
        ->except(['show']);

    // View Orders 
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
});