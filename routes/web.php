<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipacionProcesoController;
use App\Http\Controllers\AsignacionController;

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

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AsignacionController::class)->group(function(){
    Route::get('/rh/asignaciones', 'asignaciones')->name('rh.asignaciones');
    Route::post('cargar-asignados', 'cargar_asignados')->name('cargar-asignados');
    Route::get('/rh/asignados/{asignacion_id}', 'asignados')->name('rh.asignados');
});

Route::controller(ParticipacionProcesoController::class)->group(function(){
    Route::get('/sicamm/ordenamiento/{proceso_id}/{ciclo?}/{valoracion_id?}', 'ordenamiento')->name('sicamm.ordenamiento');
    Route::post('cargar-ordenamiento', 'cargar_ordenamiento')->name('cargar-ordenamiento');
});