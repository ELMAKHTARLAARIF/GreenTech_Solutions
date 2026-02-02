<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use GuzzleHttp\Handler\Proxy;
use App\Http\Controllers\AuthController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Client Page
Route::get('/products', [ProduitController::class, 'products'])->name('products');
Route::get('/Search', [ProduitController::class, 'SearchProduct'])->name(('Search'));
Route::get('/Category', [ProduitController::class, 'filtrage'])->name('Category');
Route::get('/categories',[ProduitController::class, 'ShowAllCategories'])->name('categories');
Route::get('/product-details/{id}', [ProduitController::class, 'productDetails'])->name('product-details');
// ------------------------------

// Admin dashboard and product management
Route::get('/Dashboard', [ProduitController::class, 'Dashboard'])->name('Dashboard');

Route::get('/add-product', [ProduitController::class, 'addProductForm'])->name('addProduct');
Route::post('/store-product', [ProduitController::class, 'storeProduct'])->name('store');
Route::delete('/delete-product/{id}', [ProduitController::class, 'deleteProduct'])->name('delete-product');
Route::get('/edit-product/{id}', [ProduitController::class, 'ToEditForm'])->name('edit-product');
Route::post('/Edit',[ProduitController::class,'EditProduct'])->name('Edit');
//auth


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
