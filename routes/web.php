<?php

use App\Http\Controllers\CRUDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/landing', [LandingController::class, 'index'])->name('landing');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', [CRUDController::class, 'create']);
Route::get('/read', [CRUDController::class, 'readuser']);
Route::get('/update', [CRUDController::class, 'update']);
Route::get('/detail', [CRUDController::class, 'detail']);
Route::get('/login', [CRUDController::class, 'login']);
