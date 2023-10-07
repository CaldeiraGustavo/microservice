<?php

use App\Http\Controllers\{
    AgendaController,
    EspecialidadeController,
    MedicoController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/medico', MedicoController::class);
Route::apiResource('/agenda', AgendaController::class);
Route::apiResource('/especialidade', EspecialidadeController::class);
