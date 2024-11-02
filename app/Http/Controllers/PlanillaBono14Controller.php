<?php

namespace App\Http\Controllers;


use App\Models\PlanillaBono14;
use App\Models\Nomina;
use Illuminate\Http\Request;

class PlanillaBono14Controller extends Controller
{
    public function index()
    {
        $bonos = PlanillaBono14::with('nomina')->get();
        return view('planilla_bono_14.index', compact('bonos'));
    }

    public function create()
    {
        $nominas = Nomina::all();
        return view('planilla_bono_14.create', compact('nominas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'monto' => 'required|numeric',
        ]);

        PlanillaBono14::create($request->all());
        return redirect()->route('planilla_bono_14.index')->with('mensaje', 'Bono 14 creado exitosamente.');
    }

    public function show(PlanillaBono14 $planillaBono14)
    {
        return view('planilla_bono_14.show', compact('planillaBono14'));
    }

    public function edit(PlanillaBono14 $planillaBono14)
    {
        $nominas = Nomina::all();
        return view('planilla_bono_14.edit', compact('planillaBono14', 'nominas'));
    }

    public function update(Request $request, PlanillaBono14 $planillaBono14)
    {
        $request->validate([
            'nomina_id' => 'required|exists:nomina,id',
            'monto' => 'required|numeric',
        ]);

        $planillaBono14->update($request->all());
        return redirect()->route('planilla_bono_14.index')->with('mensaje', 'Bono 14 actualizado exitosamente.');
    }

    public function destroy(PlanillaBono14 $planillaBono14)
    {
        $planillaBono14->delete();
        return redirect()->route('planilla_bono_14.index')->with('mensaje', 'Bono 14 eliminado exitosamente.');
    }
}