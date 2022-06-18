<?php

use Illuminate\Support\Facades\Mail;
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

//********************************************//
//   SECTOR WEB                               //
//********************************************//
//                                            //
// slideImages                                //
////////////////////////////////////////////////
Route::get('/', ['uses' => 'SlideController@index'])->name('/');

Route::get('plandeestudio' ,  'PlanDeEstudioController@index' )->name('plandeestudio');

// noticias

Route::get('noticia/{id}' , [ 'uses' => 'Web\NoticiaController@Noticia' ])->name('noticia');


Route::get('bolsa_de_trabajo/{id}' , [ 'uses' => 'Web\Bolsa_de_trabajoController@Bolsa_de_trabajo' ])->name('bolsa_de_trabajo');

Route::get('noticias' , [ 'uses' => 'Web\NoticiaController@indexInformativa' ])->name('noticias');
Route::get('eventos' , [ 'uses' => 'Web\EventoController@indexInformativa' ])->name('eventos');
Route::get('cronogramas' , [ 'uses' => 'Web\CronogramaController@indexInformativa' ])->name('cronogramas');
// sama
Route::get('solicitantes' , [ 'uses' => 'Web\SolicitanteController@indexInformativa' ])->name('solicitantes');
//Route::resource('admin/solicitante', 'Admin\SolicitanteController');
Route::get('admin/solicitantes', 'Admin\SolicitanteController@index')->name('solicitantes.index');
Route::get('admin/solicitantes/create', 'Admin\SolicitanteController@create')->name('solicitantes.create');
Route::post('admin/solicitantes/store', 'Admin\SolicitanteController@store')->name('solicitantes.store');
Route::get('admin/solicitantes/edit/{solicitante}', 'Admin\SolicitanteController@edit')->name('solicitantes.edit');
Route::put('admin/solicitantes/update/{solicitante}', 'Admin\SolicitanteController@update')->name('solicitantes.update');
Route::delete('admin/solicitantes/destroy/{solicitante}', 'Admin\SolicitanteController@destroy')->name('solicitantes.destroy');
Route::get('file/getSolicitante/{id}' , ['uses' => 'Web\SolicitanteController@getFileEvento'])->name('file.getSolicitante');

//area
Route::get('admin/area', 'Admin\AreaController@index')->name('area.index');
Route::get('admin/area/create', 'Admin\AreaController@create')->name('area.create');
Route::post('admin/area/store', 'Admin\AreaController@store')->name('area.store');
Route::get('admin/area/edit/{area}', 'Admin\AreaController@edit')->name('area.edit');
Route::put('admin/area/update/{area}', 'Admin\AreaController@update')->name('area.update');
Route::delete('admin/area/destroy/{area}', 'Admin\AreaController@destroy')->name('area.destroy');


Route::get('trabajos' , [ 'uses' => 'Web\TrabajoController@indexInformativa' ])->name('trabajos');

Route::get('bolsa_de_trabajos' , [ 'uses' => 'Web\Bolsa_de_trabajoController@indexInformativa' ])->name('bolsa_de_trabajos');
Route::get('crearcurriculum' , [ 'uses' => 'Web\Bolsa_de_trabajoController@crearcurriculum' ])->name('crearcurriculum');


Route::get('procedimientos' , [ 'uses' => 'Web\ProcedController@getProced' ])->name('procedimientos');
Route::get('proced/{id}' , [ 'uses' => 'Web\ProcedController@Proced' ])->name('proced');
Route::get('normas' , [ 'uses' => 'Web\NormasController@getNormaInterna' ])->name('normas');


// Route::get('plandeestudio' , [ 'plandeestudio' => 'Web\PlanDeEstudioController@index' ])->name('plandeestudio');


//Acerca del sitio
Route::get('autor-sitio', function(){return view('store.web.acerca_sitio');})->name('autor-sitio');

Route::get('contacto', function(){return view('store.contacto');})->name('contacto');
// Contacto
Route::post('contact-send','Web\ContactController@sendMessage')->name('contact.send');
//Route::post('contact-send','Web\ContactController@sendMessage')->name('contact.send');



Route::resource('estado', 'Admin\EstadoController');



Route::resource('admin/cronogramas', 'Admin\CronogramaController');
Route::resource('admin/eventos', 'Admin\EventoController');
Route::resource('admin/bolsa_de_trabajos', 'Admin\Bolsa_de_trabajoController');
Route::resource('admin/report', 'Admin\ReportController');
Route::resource('admin/noticias', 'Admin\NoticiaController');

Route::resource('archivos', 'Admin\FileController');

Route::get('derivacion/{id}', 'Admin\DerivacionController@index')->name('derivacion');
Route::post('dericion/store/{id}', 'Admin\DerivacionController@setDetalle')->name('dericion/store');

//Route::get('tramite', 'Admin\TramiteController@editver')->name('tramite');


//File
Route::get('{id}/archivo','Admin\FileUploadController@archivo')->name('archivo');
Route::post('archivo/upload/{id}', ['as' => 'upload.archivo','uses' => 'Admin\FileUploadController@upload', ]);
Route::get('/archivo/delete','Admin\FileUploadController@fileDestroy');
////////////////////////////////////////////////
// Galleries
///////////////////////////////////////////////
Route::get('gallery','Web\GalleryController@index')->name('gallery');
Route::get('/gallery/photo/{id}','Web\GalleryController@photo')->name('gallery/photo');
////////////////////////////////////////////////
// slideImages
///////////////////////////////////////////////

Route::post('slideImages/store' , ['uses' => 'SlideController@store' ,  'middleware' => ['auth' , 'userActive']])->name('slideImages.store');
Route::get('slideImages/delete/{id}' , ['uses' => 'SlideController@delete' ,  'middleware' => ['auth' , 'userActive']])->name('slideImages.delete');



////////////////////////////////////////////////
// Descargar archivos
///////////////////////////////////////////////
//Route::get('file/getNoticia/{id}' , ['uses' => 'Web\NoticiaController@getFileLaNoticias'])->name('file.getNoticia');
Route::get('file/getNoticia/{id}' , ['uses' => 'Web\NoticiaController@getFileNoticia'])->name('file.getNoticia');
Route::get('file/getEvento/{id}' , ['uses' => 'Web\EventoController@getFileEvento'])->name('file.getEvento');




Route::get('file/getCronograma/{id}' , ['uses' => 'Web\CronogramaController@getFileCronograma'])->name('file.getCronograma');
Route::get('file/getNorma/{id}' , ['uses' => 'Web\NormasController@getFileNorma'])->name('file.getNorma');

Route::get('file/getBolsa_de_trabajo/{id}' , ['uses' => 'Web\Bolsa_de_trabajoController@getFileBolsa_de_trabajo'])->name('file.getBolsa_de_trabajo');

Route::get('file/getProce/{id}' , ['uses' => 'Web\ProcedController@getFileProc'])->name('file.getProce');


//paymant
Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');


//********************************************//
//    ADMINISTRACIÓN
//********************************************//	
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/homepago', 'HomeController@homepago')->name('homepago');
	//Roles
	Route::resource('roles', 'Admin\RoleController');
	//Permisos
	Route::resource('permissions', 'Admin\PermisosController');
	//Users
	Route::resource('users', 'Admin\UserController');
	//Normas
	Route::resource('admin/normas', 'Admin\NormaController');
	//Procedimientos
	Route::resource('admin/procedimientos', 'Admin\ProcedimientoController');
	//Galeria de fotos
	Route::resource('galleries', 'Admin\GalleryController');
	//Contacto
	Route::resource('contact','Admin\ContactController');
	//Galeria
	Route::post('galleries/upload/{id}', ['as' => 'galleries.photo','uses' => 'Admin\GalleryController@upload', ]);
	Route::get('galleries/delete/fhoto','Admin\GalleryController@fhotoDestroy');
	//Requisitos
	Route::resource('requirements','Admin\RequisitoController');
	//Proceso
	Route::resource('processes','Admin\ProcesoController');
    //Tramites
    
	Route::resource('tramite', 'Admin\TramiteController');
	// students Route::get('students', 'Admin\StudentController@index')->name('student');
	Route::resource('students', 'Admin\StudentController');

    Route::get('tramite/requisito/{id}', 'Admin\TramiteController@requisito')->name('tramite.requisito');
 
    Route::get('cierredeestados/{id}', 'Admin\TramiteController@cierredeestados')->name('cierredeestados');
    Route::get('indexaceptada', 'Admin\TramiteController@indexaceptada')->name('indexaceptada');
    Route::get('indexrechazada', 'Admin\TramiteController@indexrechazada')->name('indexrechazada');
    Route::get('indexdespachado', 'Admin\TramiteController@indexdespachado')->name('indexdespachado');
    Route::get('indexver/{id}', 'Admin\TramiteController@indexver')->name('tramite.indexver');
    Route::get('indexsoli/{id}', 'Admin\TramiteController@indexsoli')->name('tramite.indexsoli');
    //sliders
    Route::resource('admin/sliders', 'Admin\SliderController');
    //Area
    Route::resource('area', 'Admin\AreaController');
    //Area academica
    Route::resource('academica', 'Admin\AreaAcademicaController');

    //Planificacion
    Route::resource('planif', 
    	'Admin\PlanifController');
    //Meta
    Route::resource('meta', 
    'Admin\MetaController');
    //Objetivo
    Route::resource('objetvo', 'Admin\ObjetivoController');

    // Email
    Route::get('sendEmail',function (){
        $data= array(
            'name' => "Email Laravel",
        );
        Mail::send('emails.Bienvenido', $data, function ($message){
            $message->from('valcyum.085@gmail.com', 'Ejemplo Envio Email ');
           $message->to('valcyum.085@gmail.com')->subject('subject Envio Email Laravel');
        });
        return "Email Enviado Exitosamente!!!";

      
    });
});