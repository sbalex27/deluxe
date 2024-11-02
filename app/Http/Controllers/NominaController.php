<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NominaController extends Controller
{
    public function index()
    {
        // Recuperar las nóminas y convertir 'fecha_pago' a objeto Carbon
        $nominas = Nomina::with('empleado')->get()->map(function ($nomina) {
            $nomina->fecha_pago = Carbon::parse($nomina->fecha_pago); // Asegúrate de que sea un objeto Carbon
            return $nomina;
        });

        return view('nomina.index', compact('nominas'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('nomina.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'salario' => 'required|numeric',
            'fecha_pago' => 'required|date',
        ]);

        Nomina::create($validatedData);

        return redirect()->route('nomina.index')->with('success', 'Nómina creada exitosamente.');
    }

    public function edit(Nomina $nomina)
{
    // Convertir fecha_pago a un objeto Carbon
    $nomina->fecha_pago = Carbon::parse($nomina->fecha_pago);

    $empleados = Empleado::all();
    return view('nomina.edit', compact('nomina', 'empleados'));
}

    public function update(Request $request, Nomina $nomina)
    {
        $validatedData = $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'salario' => 'required|numeric',
            'fecha_pago' => 'required|date',
        ]);

        $nomina->update($validatedData);

        return redirect()->route('nomina.index')->with('success', 'Nómina actualizada exitosamente.');
    }

    public function destroy(Nomina $nomina)
    {
        $nomina->delete();
        return redirect()->route('nomina.index')->with('success', 'Nómina eliminada exitosamente.');
    }
}