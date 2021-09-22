<?php

use App\Http\Controllers\ActaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DictamenController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\NormaController;
use App\Http\Controllers\VerificacionTipoController;
use App\Http\Controllers\SolicitudPropuestaController;
use App\Http\Controllers\GraficaSolicitudPropuestasController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PropuestaController;
use App\Http\Controllers\VerificadorController;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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


Route::resource('users', UserController::class)->names('users')->middleware('can:users.index');
Route::resource('permisos', PermisoController::class)->names('permisos')->middleware('can:permisos.index');
Route::resource('roles', RolController::class)->names('roles')->middleware('can:roles.index');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('empresas', EmpresaController::class)->names('empresas');
Route::resource('normas', NormaController::class)->names('normas')->middleware('can:normas.index');
Route::resource('verificacion_tipos', VerificacionTipoController::class)->names('verificacion_tipos');
Route::resource('solicitud_propuestas', SolicitudPropuestaController::class)->names('solicitud_propuestas');
Route::resource('verificadores', VerificadorController::class)->names('verificadores')->middleware('can:verificadores.index');;
Route::resource('propuestas', PropuestaController::class)->names('propuestas');
Route::resource('ordenes', OrdenController::class)->names('ordenes');
Route::resource('actas', ActaController::class)->names('actas');
Route::resource('evidencias', EvidenciaController::class)->names('evidencias');
Route::resource('dictamenes', DictamenController::class)->names('dictamenes');
//Route::get('grafica_solicitud_propuestas/{parameter?}', [GraficaSolicitudPropuestasController::class, 'index'])->name('grafica_solicitud_propuestas.index');

Route::put('grafica_solicitud_propuestas/{parameter?}', [GraficaSolicitudPropuestasController::class, 'index'])->name('grafica_solicitud_propuestas.index');

Route::get('/cliente', function () {

    $user_id = Auth::id();
    $user = new User();
    $user->id = $user_id;
   // $evidencias = Cliente::where('user_id' '=' $user_id)->orwhere('created_at', '=', $this->search)->paginate(10);
   $cliente = Cliente::where('user_id' , $user_id)->first();

if ($cliente == null) {

 
    return redirect()->route('clientes.create');
   
}
else {

    return redirect()->route('clientes.edit',compact('cliente'));
}

   

    
});
