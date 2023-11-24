<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\PerroController;
use App\http\Controllers\InteraccionController;

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

Route::get('/api/perros/random', [PerroController::class, 'GetRandom']);
Route::get('/api/perros/candidatos/{id}', [PerroController::class, 'getCandidatos']);
Route::get('/api/perros/aceptados/{id}', [PerroController::class, 'getAceptados']);
Route::get('/api/perros/rechazados/{id}', [PerroController::class, 'getRechazados']);

Route::post('/api/interacciones/preferencia', [InteraccionController::class, 'preferencia']);

Route::resource('perros',PerroController::class);
Route::resource('interacciones',InteraccionController::class);