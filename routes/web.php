<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController; // Asegúrate de tener este controlador
use App\Http\Controllers\ExpedienteeController;
use App\Http\Controllers\CompraController; // Asegúrate de tener este controlador
use App\Http\Controllers\PrestamoController; // Asegúrate de tener este controlador
use App\Http\Controllers\PermisosController; // Asegúrate de tener este controlador
use App\Http\Controllers\LiquidacionLaboralController; // Asegúrate de tener este controlador
use App\Http\Controllers\NominaController; // Asegúrate de tener este controlador
use App\Http\Controllers\PlanillaAguinaldoController; // Asegúrate de tener este controlador
use App\Http\Controllers\PlanillaBono14Controller; // Asegúrate de tener este controlador
use App\Http\Controllers\PolizaContableController; // Asegúrate de tener este controlador
use App\Http\Controllers\ArticuloVentaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para los botones
    Route::get('/empleado.index', [EmpleadoController::class, 'index'])->name('empleado');
    Route::get('/compra.index', [CompraController::class, 'index'])->name('compra');
    Route::get('/expedientes.index', [ExpedienteeController::class, 'index'])->name('expedientes.index');
    Route::post('/expedientes/ver.index', [ExpedienteeController::class, 'ver'])->name('expedientes.ver');
   
    Route::get('/articulos_venta.index', [ArticuloVentaController::class, 'index'])->name('artculos_venta');
    Route::get('/prestamo', [PrestamoController::class, 'index'])->name('prestamo');
    Route::get('/permisos.index', [PermisosController::class, 'index'])->name('permisos');
    Route::get('/liquidacion-Laboral', [LiquidacionLaboralController::class, 'index'])->name('liquidacion');
    Route::get('/nomina.index', [NominaController::class, 'index'])->name('nomina');
    Route::get('/planilla_aguinaldo', [PlanillaAguinaldoController::class, 'index'])->name('planilla_aguinaldo');
    Route::get('/planilla_bono_14.index', [PlanillaBono14Controller::class, 'index'])->name('planilla_bono_14');
    Route::get('/poliza_contable.index', [PolizaContableController::class, 'index'])->name('poliza_contable');
});
Route::resource('empleados', EmpleadoController::class);

Route::resource('compras', CompraController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('permisos', PermisosController::class);
Route::resource('liquidacion-laboral', LiquidacionLaboralController::class);
Route::resource('nomina', NominaController::class);
Route::resource('planilla_aguinaldo', PlanillaAguinaldoController::class);
Route::resource('planilla_bono_14', PlanillaBono14Controller::class);
Route::resource('poliza_contable', PolizaContableController::class);
Route::resource('articulos_venta', ArticuloVentaController::class);
require __DIR__.'/auth.php';