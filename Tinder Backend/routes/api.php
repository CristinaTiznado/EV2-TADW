<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/perros/random', [PerroController::class, 'GetRandom']);

Route::get('/perros/random', [PerroController::class, 'GetRandom']);
Route::get('/perros/candidatos/{id}', [PerroController::class, 'getCandidatos']);
Route::get('/perros/aceptados/{id}', [PerroController::class, 'getAceptados']);
Route::get('/perros/rechazados/{id}', [PerroController::class, 'getRechazados']);

Route::post('/interaccion/preferencia', [InteraccionController::class, 'preferencia']);
Route::post('/interaccion/preferencia', [InteraccionController::class, 'preferencia']);

Route::resource('perros',PerroController::class);
Route::resource('interaccion',InteraccionController::class);