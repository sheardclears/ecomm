<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserorderController;

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
    return view('slider.index');
});

Auth::routes();

//fungsi cart
Route::post('/add-to-cart', [CartController::class, 'addcart']);
Route::post('/delete-cart', [CartController::class, 'delcart']);
Route::post('/update-cart', [CartController::class, 'upcart']);

//menampilkan kategori
Route::get('/', [HomeController::class, 'index']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/category/{slug}', [HomeController::class, 'viewcate']);
Route::get('/category/{cate_slug}/{prod_slug}', [HomeController::class, 'viewprod']);

//admin dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/products', [ProductController::class, 'index'])->name('product');
    Route::get('/todo', [TaskController::class, 'index'])->name('index');
    Route::get('/orders', [OrderController::class, 'index'])->name('adminorder');
    Route::get('/users', [UserController::class, 'index'])->name('adminuser');
});

Route::get('/dashboard', [ChartController::class, 'barchart']); //menampilkan chart pada dashboard admin

//memastikan cart, checkout, dan order hanya dapat diakses oleh user
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/order', [CheckoutController::class, 'order'])->name('order')->middleware('auth');


Route::get('/vieworder', [UserorderController::class, 'index'])->name('myorder')->middleware('auth');

//fitur CRUD kategori oleh admin
Route::get('/addcategories', [CategoryController::class, 'add'])->name('add');
Route::post('/insertcategories', [CategoryController::class, 'insert'])->name('insert');
Route::get('/showcategories/{id}', [CategoryController::class, 'show'])->name('show');
Route::post('/editcategories/{id}', [CategoryController::class, 'edit'])->name('edit');
Route::get('/deletecategories/{id}', [CategoryController::class, 'delete'])->name('delete');

//fitur CRUD produk oleh admin
Route::get('/addproducts', [ProductController::class, 'add'])->name('add');
Route::post('/insertproducts', [ProductController::class, 'insert'])->name('insert');
Route::get('/showproducts/{id}', [ProductController::class, 'show'])->name('show');
Route::post('/editproducts/{id}', [ProductController::class, 'edit'])->name('edit');
Route::get('/deleteproducts/{id}', [ProductController::class, 'delete'])->name('delete');

//fitur CRUD to do oleh admin
Route::get('/addtodo', [TaskController::class, 'create'])->name('create');
Route::post('/inserttodo', [TaskController::class, 'store'])->name('store');
Route::get('/edittodo/{id}', [TaskController::class, 'edit'])->name('edittask');
Route::post('/updatetodo/{id}', [TaskController::class, 'update'])->name('updatetask');
Route::get('/deletetodo/{id}', [TaskController::class, 'delete'])->name('deletetask');

//fitur menghapus user oleh admin
Route::get('/deleteusers/{id}', [UserController::class, 'delete'])->name('delete');
