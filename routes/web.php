<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

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

//Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', [PagesController::class, 'fnIndex'])->name('xIndex');

//Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');

//Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate'])->name('Estudiante.xUpdate');

//Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar'])->name('Estudiante.xActualizar');

//Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar'])->name('Estudiante.xEliminar');

//Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante.xDetalle');

//Route::get('/galeria/{numero?}',[PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');


Route::get('/seguimiento', [PagesController::class, 'fnSeguimiento'])->name('xSeguimiento');

Route::post('/', [PagesController::class, 'fnRegistrarSeg'])->name('Seguimiento.xRegistrarseg');

//Route::post('/', [PagesController::class, 'fnRegistrar'])->name('Estudiante.xRegistrar');
Route::get('/actualizar/{id}', [PagesController::class, 'fnSegActualizar'])->name('Seguimiento.xActualizarseg');

Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdateseg'])->name('Seguimiento.xUpdateseg');


Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminarseg'])->name('Seguimiento.xEliminarseg');


Route::get('/detalleSeg/{id}', [PagesController::class, 'fnSegDetalle'])->name('Seguimiento.xDetalle');


Route::get('/galeria/{numero?}',[PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');

Route::get('/lista', [PagesController::class, 'fnLista'])->name('xLista');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
