<?php


use App\Http\Controllers\CasaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedsysController;
use App\Http\Controllers\ComentariController;
use App\Http\Controllers\ServeiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropietatController;
use \App\Http\Controllers\EspaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraduccioController;
use App\Http\Controllers\PropertyFormController;

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
Route::get('/traduccio', [TraduccioController::class, 'show']);
Route::get('/phpinfo', function () {phpinfo();});

//Ficha Casa

Route::middleware('auth')->group(function (){
    Route::post('/confirmacionReserva',[CasaController::class,'confirmacion'])->name('confirmacionReserva');
    Route::get('/confirmacionReserva',[CasaController::class,'sinAcceso'])->name('confirmacionReserva');
    Route::post('addComentario',[ComentariController::class, 'create'])->name('comentario.store');
    Route::post('/reserva',[CasaController::class, 'newReserva']) -> name('reserva.store');
    Route::post('/cuenta',[UserController::class,'cuenta'])->name('cuenta');
    Route::get('/cuenta',[UserController::class,'cuenta'])->name('cuenta');
    Route::get('/deleteComentario',[ComentariController::class,'delete'])->name('comentario.delete');
    Route::get('/comentarios',[ComentariController::class,'allComentarios'])->name('comentarios');
    Route::get('/reservas',[CasaController::class,'allReservas'])->name('reservas');

});


Route::get('/',[CasaController::class,'datosFichaCasa'])->name('principal');

//Login
Route::view('/login','login')->name('login');
Route::post('/login/check',[UserController::class,'checkLogin'])->name('login.check');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

//Register
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');


//Property
Route::get('/propertyForm', [PropietatController::class, '']);

Route::get('/property', [PropietatController::class, 'findAllByUser']) -> name('property.properties');
Route::get('/property/edit/{id}', [PropertyFormController::class, 'getPropietat']) -> name('property.edit');
Route::post('/property/edit/{id}', [PropertyFormController::class, 'updatePropietat']) -> name('property.update');
Route::get('/property/edit/{id}/calendar', [PropertyFormController::class, 'loadCalendar']) -> name('property.calendar');

Route::get('/allProperties', [PropertyFormController::class, 'AllProperties']) -> name('property.properties');

Route::view('/propertyView', 'property.property') -> name('property.view');
Route::view('/propertyForm', 'property.propertyForm');

Route::get('/propertyForm', [PropietatController::class, 'loadForm']) ->name('property.loadForm');
Route::post('/propertyForm', [PropietatController::class, 'store']) ->name('property.createProperty');


Route::controller(PropertyFormController::class) -> prefix('property/edit/{id}')
    -> group(function () {
        Route::get('/reserves/dates', 'findAllDatesReservades') -> name('findAllDatesReservades');
    });

//Espai
Route::get('/property/edit/{id}/espais', [EspaiController::class, 'loadForm']) -> name('espai.espais');


//Servei
Route::get('/serveis', [ServeiController::class, 'findAll']) ->name('servei.all');



//Redsys
Route::controller(RedsysController::class)->prefix('redsys')
    ->group(function () {
        Route::post('/', 'index') -> name('redsys');
        Route::get('/ok', 'ok');
        Route::get('/ko', 'ko');
        Route::get('/notification', 'notification');
    });

//PDF
Route::get('/factures/pdf',[RedsysController::class, 'exportPdf']) -> name('facturaPdf');
