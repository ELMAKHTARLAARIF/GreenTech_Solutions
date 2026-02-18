<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ExsController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Handler\Proxy;
use app\Http\Kernel;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Symfony\Component\Routing\Loader\Configurator\Traits\RouteTrait;
use App\Http\Controllers\RoleController;
use App\Models\Roles;
use App\Models\User;
use App\Models\Permission;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'Login'])->name('Login');
Route::post('/login', [AuthController::class, 'CheckloginData'])->name('SheckloginData');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('Logout');
//services routes
Route::get('/AuthService', [AuthController::class, 'showAuthService'])->name('AuthService');

//->middleware('auth');


//exercices route
Route::get('User/action', [PermissionController::class, 'getRouteActions'])->name('getRouteActions');
Route::get('/ex', [ExsController::class, 'ex1'])->name('ex1');

Route::middleware('admin')->group(function () {
    Route::get('/products/categories', [ProduitController::class, 'ShowAllCategories'])->name('categories');
    Route::get('/Dashboard', [ProduitController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/Dashboard/add-product', [ProduitController::class, 'addProductForm'])->name('addProduct');
    Route::post('/store-product', [ProduitController::class, 'storeProduct'])->name('store');
    Route::delete('/delete-product/{id}', [ProduitController::class, 'deleteProduct'])->name('delete-product');
    Route::get('/edit-product/{id}', [ProduitController::class, 'ToEditForm'])->name('edit-product');
    Route::post('/Edit', [ProduitController::class, 'EditProduct'])->name('Edit');
    Route::get('/User', [UserController::class, 'index'])->name('index');
    Route::get('role', [RoleController::class, 'index_role'])->name('index_role');
    Route::get('create/role', function () {
        $permissions = Permission::all();
        return view('Admin.create_Roles', compact('permissions'));
    })->name('role_form');
    Route::post('create/role', [RoleController::class, 'roles_store'])->name('roles_store');
    Route::delete('role/delete/{id}', [RoleController::class, 'delete_role'])->name('delete_role');
    Route::post('User/Create', [UserController::class, 'create'])->name('user_store');
    Route::delete('User/delete/{id}', [UserController::class, 'user_delete'])->name('user_delete');
    Route::get('User/create', [UserController::class, 'show'])->name('show');
});
Route::middleware('client')->group(function () {
    Route::get('/products', [ProduitController::class, 'products'])->name('products');
    Route::get('/products/Search', [ProduitController::class, 'SearchProduct'])->name(('Search'));
    Route::get('products/Category', [ProduitController::class, 'filtrage'])->name('Category');
    Route::get('/products/categories', [ProduitController::class, 'ShowAllCategories'])->name('categories'); //->middleware('admin');
    Route::get('/product-details/{id}', [ProduitController::class, 'productDetails'])->name('product-details');
    Route::get('/favorites', [FavoriteController::class, 'ShowFavorites'])->name('ShowFavorites');
    Route::post('/favorites/add', [FavoriteController::class, 'AddToFavorite'])
        ->name('AddToFavorite');
    Route::delete('/delete/favorite/{id}', [FavoriteController::class, 'RemovePFromFavoris'])
        ->name('delete-product-from-favorite');
});
Route::get('User/export', [UserController::class, 'export'])->name('export');
Route::get('master',function(){
    return view('client.home');
});