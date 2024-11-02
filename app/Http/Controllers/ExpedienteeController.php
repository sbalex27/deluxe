<?php

namespace App\Http\Controllers;

use App\Models\Empleado; // Asegúrate de importar el modelo Empleado
use App\Models\Compra; // Importa el modelo Compra
use App\Models\LiquidacionLaboral; // Importa el modelo LiquidacionLaboral
use App\Models\Nomina; // Importa el modelo Nomina
use App\Models\Permiso; // Importa el modelo Permiso
use App\Models\PlanillaAguinaldo; // Importa el modelo PlanillaAguinaldo
use App\Models\PlanillaBono14; // Importa el modelo PlanillaBono14
use App\Models\PolizaContable; // Importa el modelo PolizaContable
use Illuminate\Http\Request;

class ExpedienteeController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all(); // Obtener todos los empleados
        return view('expedientes.index', compact('empleados'));
    }

    public function ver(Request $request)
    {
        $empleado = Empleado::find($request->empleado_id);
        $tipo_info = $request->tipo_info;

        // Redirige al método show para obtener datos adicionales
        return $this->show($empleado->id);
    }
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        
        $compras = Compra::where('empleado_id', $id)->get();
        $liquidacionLaboral = LiquidacionLaboral::where('empleado_id', $id)->get();
        $nomina = Nomina::where('empleado_id', $id)->get();
        $permisos = Permiso::where('empleado_id', $id)->get();
        
        // Ajusta estas consultas según la columna existente en tus tablas
        $planillaAguinaldo = PlanillaAguinaldo::where('empleado_nombre', $empleado->nombre)->get(); // Cambia 'empleado_nombre' a la columna correcta
        $planillaBono14 = PlanillaBono14::where('empleado_nombre', $empleado->nombre)->get(); // Cambia 'empleado_nombre' a la columna correcta
        $polizaContable = PolizaContable::where('empleado_nombre', $empleado->nombre)->get(); // Cambia 'empleado_nombre' a la columna correcta
    
        return view('expedientes.ver', compact('empleado', 'compras', 'liquidacionLaboral', 'nomina', 'permisos', 'planillaAguinaldo', 'planillaBono14', 'polizaContable'));
    }
}