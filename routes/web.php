<?php

use App\Http\Controllers\BibliografiaController;
use App\Http\Controllers\FarmacoController;
use App\Http\Controllers\GrupoFarmacoController;
use App\Http\Controllers\InteraccionesController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;

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


Route::controller(FarmacoController::class)->group(function () {
    Route::get('/' ,'login')->name('login')->middleware('guest');
    Route::post('/entrar','iniciar')->name('sesion.login')->middleware('guest');
    Route::get('/index', "index")->name('inicio')->middleware('auth');
    
    Route::get('/farmaco',"create")->name('crear.farmaco')->middleware('auth');
    Route::get('/reportes', "reporte")->name('show.reporte')->middleware('auth');
    // Route::match(['post','put'],'/farmaco/saveForm', 'store')->name('store.farmaco');
    Route::post('/farmaco/saveForm', 'store')->name('store.farmaco')->middleware('auth');

    Route::get('/editarFarmaco/{id}', "edit")->name('edit.farmaco')->middleware('auth');
    Route::put('/update/{id}', 'update')->name('update.farmaco')->middleware('auth');
    // Route::put('/actualizar-estado/{id}', 'FarmacoController@activo')->name('activar.farmaco');
   
    // Route::get('/eliminar/{id}', "show")->name('show.farmaco');
    Route::delete('/destroy/{id}', "destroy")->name('destroy.farmaco')->middleware('auth');
    Route::get('/mostrar/{id}', 'mostrar')->name('ver.farmaco')->middleware('auth');
    Route::put('activar/{id}','activo')->name('activar.farmaco')->middleware('auth');
    Route::post('/logout','logout')->name('logout');
});
Route::controller(BibliografiaController::class)->group(function () {
    Route::get('/bibliografia', 'create')->name('create.bibliografia')->middleware('auth');
    Route::get('/editBibliografia','index')->name('show.biblios')->middleware('auth');
    Route::post('/bibliografia/savebiblio', 'store')->name('store.bibliografia')->middleware('auth');
    Route::post('/savebiblioC', 'store2')->name('store2.bibliografia')->middleware('auth');
    Route::put('/updateB','update')->name('update.biblio')->middleware('auth');
    Route::delete('/destroyB/{id}','destroy')->name('destroy.biblio')->middleware('auth');
});
Route::controller(GrupoFarmacoController::class)->group(function () {
    Route::get('/grupo', 'create')->name('create.grupo')->middleware('auth');
    Route::get('/editGrupo','index')->name('show.grupos')->middleware('auth');
    Route::post('/grupo/saveGroup', 'store')->name('store.grupo')->middleware('auth');
    Route::post('/savegrupo', 'store2')->name('store2.grupo')->middleware('auth');
    Route::put('/updateG','update')->name('update.grupo')->middleware('auth');
    Route::delete('/destroyG/{id}','destroy')->name('destroy.grupo')->middleware('auth');
});
Route::controller(InteraccionesController::class)->group(function () {
    // route::get('/interacciones','create')->name('create.interacciones');
   
    route::post('/guardar', 'store')->name('store.interacciones')->middleware('auth');
    route::post('/guardari', 'store2')->name('store2.interacciones')->middleware('auth');
    route::get('/interacciones/{id}', 'edit')->name('edit.interacciones')->middleware('auth');
    route::put('/updateI', 'update')->name('update.interacciones')->middleware('auth');
    Route::delete('/destroyI/{id}', 'destroy')->name('destroy.interaccion')->middleware('auth');
});
