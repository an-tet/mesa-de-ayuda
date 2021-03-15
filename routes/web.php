<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\EmpleadosController;
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

// <---------------------------- Areas routes --------------------------------------------------------->
Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/areas', [AreasController::class, 'index'])->name('areas.index');

Route::get('/areas/show_resource', [AreasController::class, 'show_resource'])->name('areas.show_resource');
Route::get('/areas/show', [AreasController::class, 'show'])->name('areas.show');

Route::get('/areas/create', [AreasController::class, 'create'])->name('areas.create');
Route::post('/areas/store', [AreasController::class, 'store'])->name('areas.store');

Route::get('/areas/edit/{idArea}', [AreasController::class, 'edit'])->name('areas.edit');
Route::put('/areas/update/{idArea}', [AreasController::class, 'update'])->name('areas.update');

Route::delete('/areas/destroy/{idArea}', [AreasController::class, 'destroy'])->name('areas.destroy');

// <---------------------------- Empleados routes --------------------------------------------------------->
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');


Route::get('/empleados/show_resource', [EmpleadosController::class, 'show_resource'])->name('empleados.show_resource');
Route::get('/empleados/show', [EmpleadosController::class, 'show'])->name('empleados.show');

Route::get('/empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('/empleados/store', [EmpleadosController::class, 'store'])->name('empleados.store');

Route::get('/empleados/edit/{idEmpleado}', [EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/update/{idEmpleado}', [EmpleadosController::class, 'update'])->name('empleados.update');

Route::delete('/empleados/destroy/{idEmpleado}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');
