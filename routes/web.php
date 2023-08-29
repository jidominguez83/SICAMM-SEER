<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipacionProcesoController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sicamm/ordenamiento/{proceso_id?}/{ciclo?}/{valoracion_id?}', [ParticipacionProcesoController::class, 'ordenamiento'])->name('sicamm.ordenamiento');
Route::post('cargar-ordenamiento', [ParticipacionProcesoController::class, 'cargar_ordenamiento'])->name('cargar-ordenamiento');