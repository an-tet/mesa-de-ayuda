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

Route::get('/', [IndexController::class, 'index'])->name('index.index');
// <---------------------------- Areas routes --------------------------------------------------------->

Route::get('/areas/show_resource', [AreaController::class, 'show_resource'])->name('areas.show_resource');
Route::get('/areas/show', [AreaController::class, 'show'])->name('areas.show');
Route::resource('/areas', AreaController::class)->except('show')->parameters(['areas' => 'IDAREA']);

// <---------------------------- Empleados routes --------------------------------------------------------->

Route::get('/areas/show', [EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/show_resource', [EmpleadoController::class, 'show_resource'])->name('empleados.show_resource');
Route::resource('/empleados', EmpleadoController::class)->except('show')->parameters(['empleados' => 'IDEMPLEADO']);
