<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequerimientoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// <---------------------------- Auth routes --------------------------------------------------------->

// Auth::routes(['verify' => true]);
Auth::routes();
// Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth'])->group(function () {
    // <---------------------------- Home routes --------------------------------------------------------->
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    //about ud is in a principal page before loged


    Route::group(['middleware' => ['role:administrador']], function () {
        // <---------------------------- Areas routes --------------------------------------------------------->
        Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
        Route::get('/areas/show', [AreaController::class, 'show'])->name('areas.show');
        Route::resource('/areas', AreaController::class)->except('show')->parameters(['areas' => 'IDAREA']);

        // <---------------------------- Cargo routes --------------------------------------------------------->
        Route::get('/cargos/show_resource', [CargoController::class, 'show_resource'])->name('cargos.show_resource');
        Route::get('/cargos/show', [CargoController::class, 'show'])->name('cargos.show');
        Route::resource('/cargos', CargoController::class)->except('show')->parameters(['cargos' => 'IDCARGO']);

        // <---------------------------- Empleados routes --------------------------------------------------------->
        Route::get('/empleados/show', [EmpleadoController::class, 'show'])->name('empleados.show');
        Route::get('/empleados/show_resource', [EmpleadoController::class, 'show_resource'])->name('empleados.show_resource');
        Route::resource('/empleados', EmpleadoController::class)->except('show')->parameters(['empleados' => 'IDEMPLEADO']);
    });


    // <---------------------------- Empleados routes --------------------------------------------------------->
    Route::get('/requerimientos/show', [RequerimientoController::class, 'show'])->name('requerimientos.show');
    Route::get('/requerimientos/show_resource', [RequerimientoController::class, 'show_resource'])->name('requerimientos.show_resource');
    Route::resource('/requerimientos', RequerimientoController::class)->except('show')->parameters(['requerimientos' => 'IDREQ']);
});
