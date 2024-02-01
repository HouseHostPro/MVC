<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiutatController;

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

Route::view('/','welcome');

//Login
Route::view('/login','login');
Route::post('/login/check',[LoginController::class,'checkLogin'])->name('login.check');

//Register
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
Route::get('/user/register', [CiutatController::class, 'ciutats'])->name('ciutat.ciutats');
Route::get('/user/register', [PaisController::class, 'paises'])->name('pais.paises');
