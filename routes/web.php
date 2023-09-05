<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

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
    return view('auth/login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::get('/add_user', [UsersController::class, 'add']);
Route::get('edit_user/{id}', [UsersController::class, 'edit']);


Route::post('/store', [UsersController::class, 'saveuser']);
Route::post('/update/{id}', [UsersController::class, 'upateuser']);


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

