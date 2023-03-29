<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\UsuarioAutoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('usuariosRoutes')->group(function () {
    Route::get('obtener-usuarios', [UsuarioController::class, 'showUsuario']);
    Route::post('usuario', [UsuarioController::class, 'createUsuario']);
    Route::get('obtener-usuario/{id}', [UsuarioController::class, 'indexUsuario']);
    Route::put('usuario', [UsuarioController::class, 'updateUsuario']);
    Route::delete('usuario', [UsuarioController::class, 'deleateUsuario']);
});

Route::prefix('autoRoutes')->group(function () {
    Route::get('obtener-auto/{id}', [AutoController::class, 'indexAuto']);
    Route::get('obtener-autos', [AutoController::class, 'showAuto']);
    Route::post('auto', [AutoController::class, 'createAuto']);
    Route::delete('auto', [AutoController::class, 'deleateAuto']);
    Route::put('auto', [AutoController::class, 'updateAuto']);
});

Route::prefix('usuarioAutoRoutes')->group(function () {
    Route::get('obtener-usuario-auto/{id}', [UsuarioAutoController::class, 'indexUsuarioAuto']);
    Route::get('obtener-usuarios-autos', [UsuarioAutoController::class, 'showUsuarioAuto']);
    Route::post('usuario-auto', [UsuarioAutoController::class, 'createUsuarioAuto']);
    Route::delete('usuario-auto', [UsuarioAutoController::class, 'deleateUsuarioAuto']);
    Route::put('usuario-auto', [UsuarioAutoController::class, 'updateUsuarioAuto']);
});
