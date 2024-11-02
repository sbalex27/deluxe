<?php
namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('empleado')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('prestamos.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'monto' => 'required|numeric',
            'fecha_otorgamiento' => 'required|date',
        ]);

        Prestamo::create($request->all());
        return redirect()->route('prestamos.index')->with('mensaje', 'Préstamo creado con éxito.');
    }

    public function edit(Prestamo $prestamo)
    {
        $empleados = Empleado::all();
        return view('prestamos.edit', compact('prestamo', 'empleados'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'monto' => 'required|numeric',
            'fecha_otorgamiento' => 'required|date',
        ]);

        $prestamo->update($request->all());
        return redirect()->route('prestamos.index')->with('mensaje', 'Préstamo actualizado con éxito.');
    }

    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('mensaje', 'Préstamo eliminado con éxito.');
    }
}