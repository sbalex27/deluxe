<?php

namespace App\Http\Controllers;

use App\Models\LiquidacionLaboral;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LiquidacionLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liquidaciones = LiquidacionLaboral::all()->map(function ($liquidacion) {
            // Asegúrate de que 'fecha_liquidacion' sea un objeto Carbon
            $liquidacion->fecha_liquidacion = Carbon::parse($liquidacion->fecha_liquidacion);
            return $liquidacion;
        });

        return view('liquidacionLaboral.index', compact('liquidaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all(); // Obtiene todos los empleados
        return view('liquidacionLaboral.create', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateLiquidacion($request);

        // Convierte la fecha a Carbon antes de guardar
        $validatedData['fecha_liquidacion'] = Carbon::parse($validatedData['fecha_liquidacion']);

        LiquidacionLaboral::create($validatedData);

        return redirect()->route('liquidacion-laboral.index')
            ->with('success', 'Liquidación Laboral creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  LiquidacionLaboral  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function edit(LiquidacionLaboral $liquidacion)
    {
        $empleados = Empleado::all();
        $liquidacion->fecha_liquidacion = Carbon::parse($liquidacion->fecha_liquidacion);
        
        return view('liquidacionLaboral.edit', compact('liquidacion', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  LiquidacionLaboral  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiquidacionLaboral $liquidacion)
    {
        $validatedData = $this->validateLiquidacion($request);

        $validatedData['fecha_liquidacion'] = Carbon::parse($validatedData['fecha_liquidacion']);
        $liquidacion->update($validatedData);

        return redirect()->route('liquidacion-laboral.index')
            ->with('success', 'Liquidación Laboral actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  LiquidacionLaboral  $liquidacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiquidacionLaboral $liquidacion)
    {
        $liquidacion->delete(); // Elimina la liquidación de la base de datos

        return redirect()->route('liquidacion-laboral.index')
            ->with('success', 'Liquidación Laboral eliminada exitosamente.');
    }

    /**
     * Validate the liquidacion data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function validateLiquidacion(Request $request)
    {
        return $request->validate([
            'empleado_id' => 'required|exists:empleado,id',
            'monto' => 'required|numeric',
            'fecha_liquidacion' => 'required|date',
        ]);
    }
}