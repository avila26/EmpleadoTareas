<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/empleado',          [EmpleadoController::class, 'index']);
Route::post('/empleado',         [EmpleadoController::class, 'store']);
Route::post('/buscar',        [EmpleadoController::class, 'mostrarEmpleados']);

Route::get('/tarea',          [TareaController::class, 'index']);
Route::post('/tarea',         [TareaController::class, 'store']);
