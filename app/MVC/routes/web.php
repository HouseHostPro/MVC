<?php


use App\Http\Controllers\CasaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedsysController;
use App\Http\Controllers\ComentariController;
use App\Http\Controllers\ServeiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropietatController;
use \App\Http\Controllers\EspaiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TraduccioController;
use App\Http\Controllers\PropertyFormController;
use App\Http\Controllers\MailController;

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

    //Dashboard usuari
    Route::post('/cuenta',[UserController::class,'cuenta'])->name('cuenta');
    Route::get('/cuenta',[UserController::class,'cuenta'])->name('cuenta');

    //CRUD comentaris
    Route::get('/deleteComentario/{id}',[ComentariController::class,'delete'])->name('comentario.delete.get');
    Route::post('/deleteComentario',[ComentariController::class,'delete'])->name('comentario.delete');
    Route::post('addComentario',[ComentariController::class, 'create'])->name('comentario.store');
    Route::get('/comentarios',[ComentariController::class,'comentarios'])->name('comentarios');
    Route::get('/comentariosUserAjax',[ComentariController::class,'allComent'])->name('comentariosAU');
    Route::get('/comentariosPropertiesAjax',[ComentariController::class,'allCommentsForProperties'])->name('comentariosAP');

    //CRUD reservas
    //Crear nueva reserva
    Route::post('/confirmacionReserva',[CasaController::class,'confirmacion'])->name('confirmacionReserva');
    Route::get('/confirmacionReserva',[CasaController::class,'sinAcceso'])->name('confirmacionReserva');
    Route::post('/reserva',[CasaController::class, 'newReserva']) -> name('reserva.store');
    //Mostrar reservas hechas
    Route::get('/reservas',[CasaController::class,'reservas'])->name('reservas');
    Route::get('/historialReservas',[CasaController::class,'historialReservas'])->name('historialReservas');
    Route::get('/reservasAjax',[CasaController::class,'allReservasAjax'])->name('reservasA');
    Route::get('/reservasPropertiesAjax',[CasaController::class,'allReservasPropertiesAjax'])->name('reservasAP');

    //CRUD servicios
    Route::get('/servicios',[PropertyFormController::class,'loadSevice'])->name('property.service');
    Route::get('/serviciosAjax',[PropertyFormController::class,'allService'])->name('serviceA');
    Route::get('/serviciosByProperty',[PropertyFormController::class,'serviceByProperty'])->name('serviciosPreperty');
    Route::post('/saveService',[PropertyFormController::class,'saveService'])->name('saveService');

    //Mostrar todas las propiedades
    Route::get('/allProperties', [PropertyFormController::class, 'AllProperties']) -> name('property.properties');

    //Cerrar sesión
    Route::post('/logout',[UserController::class,'logout'])->name('logout');

});


//Página principal
Route::get('/property/{id}',[CasaController::class,'datosFichaCasa'])->name('principal');

//ENDPOINT -> traduccions de una casa
Route::get('/findTraduccions', [PropietatController::class, 'findTraduccionsById']) -> name('findTraduccions');

//Login
Route::view('/login','login')->name('login');
Route::post('/login/check',[UserController::class,'checkLogin'])->name('login.check');


//Register
Route::get('/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');


//Property
Route::get('/propertyForm', [PropertyFormController::class, '']);

Route::get('/properties', [PropertyFormController::class, 'findAllByUser']) -> name('property.properties');
Route::get('/property/edit/{id}', [PropertyFormController::class, 'getPropietat']) -> name('property.edit');
Route::post('/property/edit/{id}', [PropertyFormController::class, 'updatePropietat']) -> name('property.update');
Route::get('/property/edit/{id}/calendar', [PropertyFormController::class, 'loadCalendar']) -> name('property.calendar');

Route::get('/allProperties', [PropertyFormController::class, 'AllProperties']) -> name('property.properties');

Route::view('/propertyView', 'property.property') -> name('property.view');
Route::view('/propertyForm', 'property.propertyForm');

Route::get('/propertyForm', [PropertyFormController::class, 'loadForm']) ->name('property.loadForm');
Route::post('/propertyForm', [PropertyFormController::class, 'store']) ->name('property.createProperty');


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

//Localization
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


//Mail
Route::get('/mailprova', [MailController::class, 'emailprova']) -> name('email.prova');
Route::post('/verificado', [MailController::class, 'verificar']) -> name('email.verificar');
