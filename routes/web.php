<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('index.index');
// <---------------------------- Areas routes --------------------------------------------------------->

Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
Route::get('/areas/show', [AreaController::class, 'show'])->name('areas.show');
Route::resource('/areas', AreaController::class)->except('show')->parameters(['areas' => 'IDAREA']);



// <---------------------------- Cargo routes --------------------------------------------------------->
Route::get('/cargos/show_resource', [CargoController::class, 'show_resource'])->name('cargos.show_resource');
Route::get('/cargos/show', [CargoController::class, 'show'])->name('cargos.show');
Route::resource('/cargos', CargoController::class)->except('show')->parameters(['cargos' => 'IDCARGO']);

// Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');

// Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
// Route::get('/areas/show', [AreaController::class, 'show'])->name('areas.show');

// Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
// Route::post('/areas/store', [AreaController::class, 'store'])->name('areas.store');

// Route::get('/areas/edit/{IDAREA}', [AreaController::class, 'edit'])->name('areas.edit');
// Route::put('/areas/update/{IDAREA}', [AreaController::class, 'update'])->name('areas.update');

// Route::delete('/areas/destroy/{IDAREA}', [AreaController::class, 'destroy'])->name('areas.destroy');

// <---------------------------- Empleados routes --------------------------------------------------------->

Route::get('/areas/show', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/show_resource', [EmpleadoController::class, 'show_resource'])->name('empleados.show_resource');
Route::resource('/empleados', EmpleadoController::class)->except('show')->parameters(['empleados' => 'IDEMPLEADO']);
