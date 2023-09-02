<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipacionProcesoController;
use App\Http\Controllers\UploadController;

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
Route::get('/rh/uploads', [UploadController::class, 'uploads'])->name('rh.uploads');

Route::controller(ParticipacionProcesoController::class)->group(function(){
    Route::get('/sicamm/ordenamiento/{proceso_id}/{ciclo?}/{valoracion_id?}', 'ordenamiento')->name('sicamm.ordenamiento');
    Route::post('cargar-ordenamiento', 'cargar_ordenamiento')->name('cargar-ordenamiento');
});