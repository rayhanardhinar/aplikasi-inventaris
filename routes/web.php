<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::prefix('products')->name('pages.products.')->group(function (){
    Route::get('/', [ProductController::class, 'product'])->name('product');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete');
});
