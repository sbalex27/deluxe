<?php

namespace App\Http\Controllers;

use App\Models\PlanillaAguinaldo;
use App\Models\Nomina;
use Illuminate\Http\Request;

class PlanillaAguinaldoController extends Controller
{
    public function index()
    {
        $planillas = PlanillaAguinaldo::with('nomina')->get();
        return view('planilla_aguinaldo.index', compact('planillas'));
    }

    public function create()
    {
        $nominas = Nomina::all();
        return view('planilla_aguinaldo.create', compact('nominas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'monto' => 'required|numeric',
        ]);

        PlanillaAguinaldo::create($request->all());
        return redirect()->route('planilla_aguinaldo.index')->with('success', 'Aguinaldo creado exitosamente.');
    }

    public function edit(PlanillaAguinaldo $planillaAguinaldo)
    {
        $nominas = Nomina::all();
        return view('planilla_aguinaldo.edit', compact('planillaAguinaldo', 'nominas'));
    }

    public function update(Request $request, PlanillaAguinaldo $planillaAguinaldo)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'monto' => 'required|numeric',
        ]);

        $planillaAguinaldo->update($request->all());
        return redirect()->route('planilla_aguinaldo.index')->with('success', 'Aguinaldo actualizado exitosamente.');
    }

    public function destroy(PlanillaAguinaldo $planillaAguinaldo)
    {
        $planillaAguinaldo->delete();
        return redirect()->route('planilla_aguinaldo.index')->with('success', 'Aguinaldo eliminado exitosamente.');
    }
}