<?php

use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\EvaluacionProveedorController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Models\EvaluacionProveedor;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', CheckRole::class . ':1'])->group(function () {

    Route::get('usuarios/ver', [UserController::class,'index'])->name('ver-usuarios');
    Route::get('sedes/ver', [SedeController::class,'index'])->name('ver-sedes');
    Route::get('insumos/ver', [InsumoController::class,'index'])->name('ver-insumos');
    Route::get('proveedor/ver', [ProveedorController::class,'index'])->name('ver-proveedor');
    Route::get('solicitudes/ver', [ServicioController::class,'verSolicitudes'])->name('ver-solicitudes');
    Route::get('pagos/ver', [PagosController::class,'index'])->name('ver-pagos');
    Route::get('pedidos', [PedidoController::class,'index'])->name('pedidos');
    Route::get('proveedor/evaluaciones', [EvaluacionProveedorController::class,'index'])->name('evaluacion-proveedor');

});


Route::middleware(['auth', CheckRole::class . ':2,3,4,5'])->group(function () {

    Route::get('servicios/ver', [ServicioController::class,'index'])->name('ver-servicios');
    Route::get('pedidos/ver', [PedidoController::class,'index'])->name('ver-pedidos');

});

Route::middleware(['auth', CheckRole::class . ':6'])->group(function () {

    Route::get('servicios/solicitudes', [ServicioController::class,'verSolicitados'])->name('ver-servicios-requeridos');
    Route::get('pagos/solicitados', [PagosController::class,'verPagosSolicitados'])->name('ver-pagos-solicitados');

});


Route::get('/rut_colaborador/{filename}',[ColaboradorController::class,'getRut'])->name('rut_colaborador');
Route::get('/referencia_banco_colaborador/{filename}',[ColaboradorController::class,'getReferenciaBancaria'])->name('referencia_banco_colaborador');
