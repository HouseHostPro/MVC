<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropietatController;
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

Route::view('/','welcome');

//Login
Route::view('/login','login');
Route::post('/login/check',[UserController::class,'checkLogin'])->name('login.check');

//Register
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');

//Property
Route::get('/property', [PropietatController::class, 'findAllByUser']) -> name('property.findAllByUser');
Route::get('/propertyForm', [PropietatController::class, '']);

Route::view('/propertyView', 'property.property') -> name('property.view');
Route::view('/propertyForm', 'property/propertyForm');

Route::post('/propertyForm', [PropietatController::class, 'store']) ->name('property.createProperty');
