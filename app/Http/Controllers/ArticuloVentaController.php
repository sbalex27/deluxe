<?php

namespace App\Http\Controllers;

use App\Models\ArticuloVenta;
use Illuminate\Http\Request;

class ArticuloVentaController extends Controller
{
    public function index()
    {
        $articulos = ArticuloVenta::all();
        return view('articulos_venta.index', compact('articulos'));
    }

    public function create()
    {
        return view('articulos_venta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_articulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_disponibilidad' => 'required|date',
        ]);

        ArticuloVenta::create($request->all());
        return redirect()->route('articulos_venta.index')->with('success', 'Artículo creado exitosamente.');
    }

    public function show(ArticuloVenta $articuloVenta)
    {
        return view('articulos_venta.show', compact('articuloVenta'));
    }

    public function edit(ArticuloVenta $articuloVenta)
    {
        return view('articulos_venta.edit', compact('articuloVenta'));
    }

    public function update(Request $request, ArticuloVenta $articuloVenta)
    {
        $request->validate([
            'nombre_articulo' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'precio' => 'required|numeric',
            'cantidad_disponible' => 'required|integer',
            'fecha_disponibilidad' => 'required|date',
        ]);

        $articuloVenta->update($request->all());
        return redirect()->route('articulos_venta.index')->with('success', 'Artículo actualizado exitosamente.');
    }

    public function destroy(ArticuloVenta $articuloVenta)
    {
        $articuloVenta->delete();
        return redirect()->route('articulos_venta.index')->with('success', 'Artículo eliminado exitosamente.');
    }
}