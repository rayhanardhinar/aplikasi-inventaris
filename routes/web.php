<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsLogin;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(IsLogin::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('permission:view dashboard');

    Route::prefix('products')->name('pages.products.')->middleware('permission:view products')->group(function () {
        Route::get('/', [ProductController::class, 'product'])->name('product');

        Route::middleware('permission:create products')->group(function () {
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
        });

        Route::middleware('permission:edit products')->group(function () {
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        });

        Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete')->middleware('permission:delete products');
    });

    Route::prefix('categories')->name('pages.categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'category'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
});
