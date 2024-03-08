<?php


use App\Http\Controllers\CasaController;
use App\Http\Controllers\ImagenesController;
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
//PONER EL FORBIDDEN A TODOS LOS FORM PARA QUE NO SE PUEDA ACCEDER POR GET


Route::group(['middleware' => ['auth', 'cors']], function (){

    //Dashboard usuari
    Route::post('/property/{id}/cuenta',[UserController::class,'cuenta'])->name('cuenta');
    Route::get('/property/{id}/cuenta',[UserController::class,'cuenta'])->name('cuenta');

    //CRUD comentaris
    Route::get('/deleteComentario/{id}/{estat}',[ComentariController::class,'delete'])->name('comentario.delete.get');
    Route::post('/deleteComentario',[ComentariController::class,'delete'])->name('comentario.delete');
    Route::post('addComentario',[ComentariController::class, 'create'])->name('comentario.store');
    Route::get('addComentario',[ComentariController::class, 'create'])->name('comentario.store.get');
    Route::get('/comentarios',[ComentariController::class,'comentarios'])->name('comentarios');
    Route::get('/allComentarios',[ComentariController::class,'allComentarios'])->name('allComentarios');
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
    Route::get('/property/{id}/property/{prop_id}/servicios',[PropertyFormController::class,'loadSevice'])->name('property.service');
    Route::get('/serviciosAjax',[PropertyFormController::class,'allService'])->name('serviceA');
    Route::get('/serviciosByProperty/{id}',[PropertyFormController::class,'serviceByProperty'])->name('serviciosPreperty');//AJAX
    Route::post('/property/{id}/property/{prop_id}/saveService',[PropertyFormController::class,'saveService'])->name('saveService');

    //CRUD espacios
    Route::get('/property/{id}/property/{prop_id}/espacios', [PropertyFormController::class, 'loadEspacios']) -> name('espai.espais');
    Route::get('/allEspaciosAjax',[PropertyFormController::class,'allEspaciosAjax'])->name('allEspaciosAjax');
    Route::get('/allEspaciosByPropertyAjax/{id}',[PropertyFormController::class,'espaciosByProperty'])->name('espaciosByProperty');
    Route::post('/property/{id}/property/{prop_id}/saveEspacios',[PropertyFormController::class,'saveEspacios'])->name('saveEspacios');

    //CRUD normas
    Route::get('/property/{id}/property/{prop_id}/normas', [PropertyFormController::class, 'loadNormas']) -> name('property.normas');
    Route::post('/property/{id}/property/{prop_id}/saveNormas',[PropertyFormController::class,'saveNormas'])->name('saveNormas');
    Route::get('/allNormasByPropertyAjax/{id}',[PropertyFormController::class,'allNormasAjax'])->name('allNormasAjax');

    //Mostrar todas las propiedades
    Route::get('/allProperties', [PropertyFormController::class, 'AllProperties']) -> name('property.properties');
    Route::get('/property/{id}/properties', [PropertyFormController::class, 'findAllByUser']) -> name('property.properties');
    Route::get('/allTraduccions', [PropietatController::class, 'findTraduccionsById']) -> name('property.traduccions');

    //CRUD imagenes
    Route::get('/property/{id}/property/{prop_id}/galeria',[ImagenesController::class, 'allImages'])->name('property.gallery');
    Route::post('/property/{id}/property/{prop_id}/galeria',[ImagenesController::class, 'store'])->name('store.image');
    Route::post('/property/{id}/property/{prop_id}/galeria/delete',[ImagenesController::class, 'delete'])->name('delete.image');

    //Calendar
    Route::get('/property/{id}/property/edit/{prop_id}/calendar', [PropertyFormController::class, 'loadCalendar']) -> name('property.calendar');
    Route::post('/property/{id}/property/edit/{prop_id}/calendar/savePrice', [PropertyFormController::class, 'savePriceForDay']) -> name('savePriceForDay');
    Route::post('/property/{id}/property/edit/{prop_id}/calendar/saveDays', [PropertyFormController::class, 'saveDisableDays']) -> name('saveDisableDays');
    Route::post('/property/{id}/property/edit/{prop_id}/calendar/delete', [PropertyFormController::class, 'deleteDisableDays']) -> name('deleteDisableDays');

    //Redsys
    Route::controller(RedsysController::class)->prefix('/property/{id}/redsys')
        ->group(function () {
            Route::post('/', 'index') -> name('redsys');
            Route::get('/notification', 'notification');
        });

    Route::get('redsys/ok', [RedsysController::class, 'ok']);
    Route::get('redsys/ko', [RedsysController::class, 'ko']);

//PDF
    Route::get('/factures/pdf',[RedsysController::class, 'exportPdf']) -> name('facturaPdf');

    //Cerrar sesión
    Route::post('/property/{id}/logout',[UserController::class,'logout'])->name('logout');

});

//Reservas
Route::get('/allDatesReservades/{id}',[PropertyFormController::class,'findAllDatesReservades'])->name('findAllDatesReservades');

//Petición Ajax Imagenes de la casa
Route::get('/allImagesAjax',[ImagenesController::class,'allImagesAjax'])->name('allImagesAjax');


//Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
    Route::get('/property/{id}',[CasaController::class,'datosFichaCasa'])->name('principal');
//});
//Página principal

//ENDPOINT -> traduccions de una casa
Route::get('/findTraduccions', [PropietatController::class, 'findTraduccionsById']) -> name('findTraduccions');

//Login
Route::view('/property/{id}/login','login')->name('login');
Route::post('/property/{id}/login/check',[UserController::class,'checkLogin'])->name('login.check');


//Register
Route::get('/property/{id}/user/register', [UserController::class,'register'])->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');


//Property
Route::get('/propertyForm', [PropertyFormController::class, '']);

Route::get('/property/{id}/property/edit/{prop_id}', [PropertyFormController::class, 'getPropietat']) -> name('property.edit');
Route::post('/property/{id}/property/edit/{prop_id}', [PropertyFormController::class, 'updatePropietat']) -> name('property.update');

Route::post('/property/{id}/property/edit/{prop_id}/calendar', [PropertyFormController::class, 'savePreuTemporada']) -> name('property.saveCalendar');


Route::view('/propertyView', 'property.property') -> name('property.view');
Route::view('/propertyForm', 'property.propertyForm');

Route::get('property/{id}/propertyForm', [PropertyFormController::class, 'loadForm']) ->name('property.loadForm');
Route::post('property/{id}/propertyForm', [PropertyFormController::class, 'store']) ->name('property.createProperty');


Route::controller(PropertyFormController::class) -> prefix('property/edit/{id}')
    -> group(function () {
        Route::get('/reserves/dates', 'findAllDatesReservades') -> name('findAllDatesReservades');
    });




//Servei
Route::get('/serveis', [ServeiController::class, 'findAll']) ->name('servei.all');





//Localization
/*Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});*/

Route::get('en', function () {
    session(['locale' => 'en']);
    return back();
});

Route::get('es', function () {
    session(['locale' => 'es']);
    return back();
});


//Mail
Route::get('/mailprova', [MailController::class, 'emailprova']) -> name('email.prova');
Route::post('/verificado', [MailController::class, 'verificar']) -> name('email.verificar');
