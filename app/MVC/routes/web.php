<?php


use App\Http\Controllers\CasaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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


//Ficha Casa
Route::view('/','fichaCasa')->name('principal');
Route::post('/confirmacionReserva',[CasaController::class,'confirmacion'])->name('confirmacionReserva');

//Login
Route::view('/login','login')->name('login');
Route::post('/login/check',[UserController::class,'checkLogin'])->name('login.check');

//Register
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');


