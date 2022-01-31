<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoiningController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;


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
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('/home', [CustomAuthController::class, 'home_view'])->name('home');
Route::get('/front-end', [CustomAuthController::class, 'front_end'])->name('front-end');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [CustomAuthController::class, 'create_login'])->name('login');
Route::post('/check-login', [CustomAuthController::class, 'check_login'])->name('check-login');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/register', [CustomAuthController::class, 'create_register'])->name('register');
Route::post('/store-register', [CustomAuthController::class, 'store_register'])->name('store-register');
Route::get('/dashboard', [CustomAuthController::class, 'dashboardView'])->name('dashboard');

//user details
Route::get('add-user', [UserController::class, 'create'])->name('add-user');
Route::post('store-user', [UserController::class, 'store'])->name('store-user');
Route::get('show-user', [UserController::class, 'fetch'])->name('show-user');
Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('update-user/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::get('search-user', [UserController::class, 'search'])->name('search-user');
Route::get('/print-user',[PrintController::class, 'printUser'])->name('print-user');
// ajax cruds
Route::get('add-employee',[EmployeeController::class, 'index']);
Route::post('store-employee',[EmployeeController::class, 'store'])->name('store-employee');
Route::get('show-employee',[EmployeeController::class, 'fetch'])->name('show-employee');
Route::get('edit-employee/{id}',[EmployeeController::class, 'edit']);
Route::post('update-employee/{id}',[EmployeeController::class, 'update']);
Route::delete('delete-employee/{id}',[EmployeeController::class, 'destroy']);

// Route::get('add-employee',[EmployeeController::class, 'search']);


Route::get('add-product', [ProductController::class, 'create'])->name('add-product');
Route::post('store-product', [ProductController::class, 'store'])->name('store-product');
Route::get('show-product', [ProductController::class, 'fetch'])->name('show-product');
Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::post('update-product/{id}', [ProductController::class, 'update']);
Route::get('delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');
Route::post('search-product', [ProductController::class, 'search'])->name('search-product');

Route::get('add-product-category', [ProductCategoryController::class, 'create'])->name('add-product-category');
Route::post('store-product-category', [ProductCategoryController::class, 'store'])->name('store-product-category');
Route::get('show-product-category', [ProductCategoryController::class, 'fetch'])->name('show-product-category');
Route::get('edit-product-category/{id}', [ProductCategoryController::class, 'edit'])->name('edit-product-category');
Route::post('update-product-category/{id}', [ProductCategoryController::class, 'update']);
Route::get('delete-product-category/{id}', [ProductCategoryController::class, 'destroy'])->name('delete-product-category');
Route::post('search-product-category', [ProductCategoryController::class, 'search'])->name('search-product-category');

Route::get('add-product-subcategory', [ProductCategoryController::class, 'create'])->name('add-product-subcategory');
Route::post('store-product-subcategory', [ProductCategoryController::class, 'store'])->name('store-product-subcategory');
Route::get('show-product-subcategory', [ProductCategoryController::class, 'fetch'])->name('show-product-subcategory');
Route::get('edit-product-subcategory/{id}', [ProductCategoryController::class, 'edit'])->name('edit-product-subcategory');
Route::post('update-product-subcategory/{id}', [ProductCategoryController::class, 'update']);
Route::get('delete-product-subcategory/{id}', [ProductCategoryController::class, 'destroy'])->name('delete-product-subcategory');
Route::post('search-product-subcategory', [ProductCategoryController::class, 'search'])->name('search-product-subcategory');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('innerjoin', [JoiningController::class, 'innerjoin'])->name('innerjoin');
Route::get('leftjoin', [JoiningController::class, 'leftjoin'])->name('leftjoin');
Route::get('rightjoin', [JoiningController::class, 'rightjoin'])->name('rightjoin');
Route::get('crossjoin', [JoiningController::class, 'crossjoin'])->name('crossjoin');
Route::get('advancejoin', [JoiningController::class, 'advancejoin'])->name('advancejoin');
