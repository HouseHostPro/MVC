<?php


use App\Http\Controllers\CasaController;
use App\Http\Controllers\ComentariController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServeiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropietatController;
use \App\Http\Controllers\EspaiController;
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

Route::middleware('auth')->group(function (){
    Route::post('/confirmacionReserva',[CasaController::class,'confirmacion'])->name('confirmacionReserva');
    Route::get('/confirmacionReserva',[CasaController::class,'confirmacion'])->name('confirmacionReserva');
    Route::post('addComentario',[ComentariController::class, 'create'])->name('comentario.store');
    Route::post('/reserva',[CasaController::class, 'newReserva']) -> name('reserva.store');
    Route::get('/cuenta',[UserController::class,'cuenta'])->name('cuenta');

});


Route::get('/',[CasaController::class,'datosFichaCasa'])->name('principal');

//Login
Route::view('/login','login')->name('login');
Route::post('/login/check',[UserController::class,'checkLogin'])->name('login.check');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

//Register
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');
Route::get('/user/update/{id}', [UserController::class, 'userId'])->name('user.userId');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

//Property
//Route::get('/property', [PropietatController::class, 'findAllByUser']) -> name('property.findAllByUser');
Route::get('/propertyForm', [PropietatController::class, '']);

Route::get('/property', [PropietatController::class, 'findAllByUser']) -> name('property.properties');
Route::get('/property/edit/{id}', [PropietatController::class, 'getPropietat']) -> name('property.edit');
//Route::post('/property/update/{id}', [PropietatController::class, 'store']) -> name('property.store');

Route::view('/propertyView', 'property.property') -> name('property.view');
Route::view('/propertyForm', 'property/propertyForm');

Route::get('/propertyForm', [PropietatController::class, 'loadForm']) ->name('property.loadForm');
Route::post('/propertyForm', [PropietatController::class, 'store']) ->name('property.createProperty');

//Espai
Route::get('/property/edit/{id}/espais', [EspaiController::class, 'loadForm']) -> name('espai.espais');
//Route::post('/espaiForm', [EspaiController::class, 'create']) -> name('espai.create');
//Route::get('/espaiForm', 'property/espaiForm') -> name('espai.form');


//Servei
Route::get('/serveis', [ServeiController::class, 'findAll']) ->name('servei.all');
