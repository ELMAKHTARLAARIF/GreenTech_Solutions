<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProduitController;

use GuzzleHttp\Handler\Proxy;
use app\Http\Kernel;
use App\Http\Controllers\AuthController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Client Page
Route::get('/products', [ProduitController::class, 'products'])->name('products')->middleware('client');
Route::get('/products/Search', [ProduitController::class, 'SearchProduct'])->name(('Search'));
Route::get('products/Category', [ProduitController::class, 'filtrage'])->name('Category')->middleware('client');
Route::get('/products/categories', [ProduitController::class, 'ShowAllCategories'])->name('categories')->middleware('admin');
Route::get('/product-details/{id}', [ProduitController::class, 'productDetails'])->name('product-details');

// Admin dashboard and product management
Route::get('/Dashboard', [ProduitController::class, 'Dashboard'])
    ->name('Dashboard')
    ->middleware('admin');

Route::get('/Dashboard/add-product', [ProduitController::class, 'addProductForm'])
    ->name('addProduct')
    ->middleware('admin');

Route::post('/store-product', [ProduitController::class, 'storeProduct'])->name('store');
Route::delete('/delete-product/{id}', [ProduitController::class, 'deleteProduct'])->name('delete-product');
Route::get('/edit-product/{id}', [ProduitController::class, 'ToEditForm'])->name('edit-product');
Route::post('/Edit', [ProduitController::class, 'EditProduct'])->name('Edit');
//auth


Route::get('/', [AuthController::class, 'Login'])->name('Login');
Route::post('/login', [AuthController::class, 'SheckloginData'])->name('SheckloginData');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
//services routes
Route::get('/AuthService', [App\Http\Services\AuthService::class, 'register'])->name('AuthService');
//favorites
Route::get('/favorites',[FavoriteController::class,'ShowFavorites'])->name('ShowFavorites');
Route::post('/favorites/add', [FavoriteController::class, 'AddToFavorite'])
    ->name('AddToFavorite')
    ->middleware('auth');