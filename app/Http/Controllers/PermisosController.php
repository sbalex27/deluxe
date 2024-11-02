<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\Empleado; // Asegúrate de tener este modelo
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    public function index()
    {
        $permisos = Permiso::with('empleado')->get();
        return view('permisos.index', compact('permisos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('permisos.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'tipo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Permiso::create($request->all());
        return redirect()->route('permisos.index')->with('mensaje', 'Permiso creado con éxito.');
    }

    public function edit(Permiso $permiso)
    {
        $empleados = Empleado::all();
        return view('permisos.edit', compact('permiso', 'empleados'));
    }

    public function update(Request $request, Permiso $permiso)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'tipo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $permiso->update($request->all());
        return redirect()->route('permisos.index')->with('mensaje', 'Permiso actualizado con éxito.');
    }

    public function destroy(Permiso $permiso)
    {
        $permiso->delete();
        return redirect()->route('permisos.index')->with('mensaje', 'Permiso eliminado con éxito.');
    }
}