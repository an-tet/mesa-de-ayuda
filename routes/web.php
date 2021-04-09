<?php

use App\Http\Controllers\AreaController;
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

// <---------------------------- Areas routes --------------------------------------------------------->

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::resource('/areas', AreaController::class)->parameters(['areas' => 'IDAREA']);
Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
// Route::group(function () {
// });

// Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');

// Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
// Route::get('/areas/show', [AreaController::class, 'show'])->name('areas.show');

// Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
// Route::post('/areas/store', [AreaController::class, 'store'])->name('areas.store');

// Route::get('/areas/edit/{IDAREA}', [AreaController::class, 'edit'])->name('areas.edit');
// Route::put('/areas/update/{IDAREA}', [AreaController::class, 'update'])->name('areas.update');

// Route::delete('/areas/destroy/{IDAREA}', [AreaController::class, 'destroy'])->name('areas.destroy');

// <---------------------------- Empleados routes --------------------------------------------------------->

Route::resource('/empleados', EmpleadoController::class)->parameters(['empleados' => 'IDEMPLEADO']);
Route::get('/empleados/show_resource', [EmpleadoController::class, 'show_resource'])->name('areas.show_resource');


// Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    

// Route::get('/empleados/show_resource', [EmpleadoController::class, 'show_resource'])->name('empleados.show_resource');
// Route::get('/empleados/show', [EmpleadoController::class, 'show'])->name('empleados.show');

// Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
// Route::post('/empleados/store', [EmpleadoController::class, 'store'])->name('empleados.store');

// Route::get('/empleados/edit/{idEmpleado}', [EmpleadoController::class, 'edit'])->name('empleados.edit');
// Route::put('/empleados/update/{idEmpleado}', [EmpleadoController::class, 'update'])->name('empleados.update');

// Route::delete('/empleados/destroy/{idEmpleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
