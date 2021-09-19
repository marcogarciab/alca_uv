<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\NormaController;
use App\Http\Controllers\VerificacionTipoController;
use App\Http\Controllers\SolicitudPropuestaController;
use App\Http\Controllers\GraficaSolicitudPropuestasController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('users', UserController::class)->names('users');
Route::resource('permisos', PermisoController::class)->names('permisos');
Route::resource('roles', RolController::class)->names('roles');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('empresas', EmpresaController::class)->names('empresas');
Route::resource('normas', NormaController::class)->names('normas');
Route::resource('verificacion_tipos', VerificacionTipoController::class)->names('verificacion_tipos');
Route::resource('solicitud_propuestas', SolicitudPropuestaController::class)->names('solicitud_propuestas');
//Route::get('grafica_solicitud_propuestas/{parameter?}', [GraficaSolicitudPropuestasController::class, 'index'])->name('grafica_solicitud_propuestas.index');

Route::put('grafica_solicitud_propuestas/{parameter?}', [GraficaSolicitudPropuestasController::class, 'index'])->name('grafica_solicitud_propuestas.index');

