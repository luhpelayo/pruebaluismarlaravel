<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PersonalController;

use App\Http\Controllers\Auth\LoginController;
Route::get('/test', function () {
    return response()->json(['message' => '¡La API está funcionando correctamente!']);
});

// Rutas del personal API
Route::get('/personal', [PersonalController::class, 'indexAPI']);
Route::post('/personal', [PersonalController::class, 'storeAPI']);
Route::delete('/personal/{personal}', [PersonalController::class, 'destroyAPI']);
Route::match(['post', 'put'], '/personal/{personal}', [PersonalController::class, 'updateAPI']);
Route::match(['post', 'put'], '/personal/{id}', [PersonalController::class, 'updateImageUrlAPI']);

// Rutas de autenticación de la API
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

// Rutas protegidas que requieren autenticación
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/user', function (\Illuminate\Http\Request $request) {
        return $request->user();
    });
});

