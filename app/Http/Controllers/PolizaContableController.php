<?php

namespace App\Http\Controllers;

use App\Models\PolizaContable;
use Illuminate\Http\Request;

class PolizaContableController extends Controller
{
    public function index()
    {
        $polizas = PolizaContable::all();
        return view('poliza_contable.index', compact('polizas'));
    }

    public function create()
    {
        return view('poliza_contable.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'detalles' => 'required|string',
        ]);

        PolizaContable::create($request->all());
        return redirect()->route('poliza_contable.index')->with('success', 'Poliza contable creada exitosamente.');
    }

    public function show(PolizaContable $polizaContable)
    {
        return view('poliza_contable.show', compact('polizaContable'));
    }

    public function edit(PolizaContable $polizaContable)
    {
        return view('poliza_contable.edit', compact('polizaContable'));
    }

    public function update(Request $request, PolizaContable $polizaContable)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'detalles' => 'required|string',
        ]);

        $polizaContable->update($request->all());
        return redirect()->route('poliza_contable.index')->with('success', 'Poliza contable actualizada exitosamente.');
    }

    public function destroy(PolizaContable $polizaContable)
    {
        $polizaContable->delete();
        return redirect()->route('poliza_contable.index')->with('success', 'Poliza contable eliminada exitosamente.');
    }
}