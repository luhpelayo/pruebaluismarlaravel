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

// noticias
Route::get('noticias' , [ 'uses' => 'Web\NoticiaController@indexInformativa' ])->name('noticias');
Route::get('eventos' , [ 'uses' => 'Web\EventoController@indexInformativa' ])->name('eventos');
Route::get('cronogramas' , [ 'uses' => 'Web\CronogramaController@indexInformativa' ])->name('cronogramas');
Route::get('trabajos' , [ 'uses' => 'Web\TrabajoController@indexInformativa' ])->name('trabajos');

Route::get('procedimientos' , [ 'uses' => 'Web\ProcedController@getProced' ])->name('procedimientos');
Route::get('proced/{id}' , [ 'uses' => 'Web\ProcedController@Proced' ])->name('proced');
Route::get('normas' , [ 'uses' => 'Web\NormasController@getNormaInterna' ])->name('normas');

//Acerca del sitio
Route::get('autor-sitio', function(){return view('store.web.acerca_sitio');})->name('autor-sitio');

Route::get('contacto', function(){return view('store.contacto');})->name('contacto');
// Contacto
Route::post('contact-send','Web\ContactController@sendMessage')->name('contact.send');
//Route::post('contact-send','Web\ContactController@sendMessage')->name('contact.send');

Route::get('aca', 'Admin\ReportController@index')->name('aca');

Route::resource('estado', 'Admin\EstadoController');
Route::resource('solicitante', 'Admin\SolicitanteController');
Route::resource('admin/cronogramas', 'Admin\CronogramaController');
Route::resource('admin/eventos', 'Admin\EventoController');
Route::resource('admin/noticias', 'Admin\NoticiaController');

Route::resource('archivos', 'Admin\FileController');

Route::get('derivacion/{id}', 'Admin\DerivacionController@index')->name('derivacion');
Route::post('dericion/store/{id}', 'Admin\DerivacionController@setDetalle')->name('dericion/store');

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
Route::get('file/getNoticia/{id}' , ['uses' => 'Web\NoticiaController@getFileNoticia'])->name('file.getNoticia');
Route::get('file/getEvento/{id}' , ['uses' => 'Web\EventoController@getFileEvento'])->name('file.getEvento');
Route::get('file/getCronograma/{id}' , ['uses' => 'Web\CronogramaController@getFileCronograma'])->name('file.getCronograma');
Route::get('file/getNorma/{id}' , ['uses' => 'Web\NormasController@getFileNorma'])->name('file.getNorma');



Route::get('file/getProce/{id}' , ['uses' => 'Web\ProcedController@getFileProc'])->name('file.getProce');

//********************************************//
//    ADMINISTRACIÓN
//********************************************//	
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
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
    Route::get('tramite/requisito/{id}', 'Admin\TramiteController@requisito')->name('tramite.requisito');
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