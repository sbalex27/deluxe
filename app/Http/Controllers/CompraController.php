<?php

namespace App\Http\Controllers;


use App\Models\Compra;
use App\Models\Empleado;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Muestra la lista de compras
    public function index()
    {
        $compras = Compra::with('empleado')->get();
        return view('compras.index', compact('compras'));
    }

    // Muestra el formulario para crear una nueva compra
    public function create()
    {
        $empleados = Empleado::all();
        return view('compras.create', compact('empleados'));
    }

    // Almacena una nueva compra
    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
        ]);

        Compra::create($request->all());
        return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
    }

    // Muestra una compra específica
    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    // Muestra el formulario para editar una compra
    public function edit(Compra $compra)
    {
        $empleados = Empleado::all();
        return view('compras.edit', compact('compra', 'empleados'));
    }

    // Actualiza una compra específica
    public function update(Request $request, Compra $compra)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'descripcion' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
        ]);

        $compra->update($request->all());
        return redirect()->route('compras.index')->with('success', 'Compra actualizada exitosamente.');
    }

    // Elimina una compra específica
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra eliminada exitosamente.');
    }
}