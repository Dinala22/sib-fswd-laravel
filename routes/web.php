<?php

use App\Http\Controllers\CRUDController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', [CRUDController::class, 'create']);
Route::get('/read', [CRUDController::class, 'readuser']);
Route::get('/update', [CRUDController::class, 'update']);
Route::get('/detail', [CRUDController::class, 'detail']);
Route::get('/login', [CRUDController::class, 'login']);
