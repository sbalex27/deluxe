<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Empleado; // Asegúrate de importar el modelo Empleado
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
   // Mostrar la lista de empleados
public function index()
{
    $empleados = Empleado::paginate(10); // Cambia 10 por el número de elementos por página que desees
    return view('empleado.index', compact('empleados')); // Pasar los empleados a la vista
}

    // Mostrar el formulario para crear un nuevo empleado
    public function create()
    {
        return view('empleado.create');
    }

    // Almacenar un nuevo empleado
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'titulo' => 'nullable|file|mimes:pdf|max:2048',
            'diploma' => 'nullable|file|mimes:pdf|max:2048',
            'ante_penales_policia' => 'nullable|file|mimes:pdf|max:2048',
            'copia_dpi' => 'nullable|file|mimes:pdf|max:2048',
            'nombre_conyuge' => 'nullable|string|max:100',
            'fecha_nacimiento_conyuge' => 'nullable|date',
            'nombre_hijo' => 'nullable|string|max:100',
            'fecha_nacimiento_hijo' => 'nullable|date',
            'foto_empleado' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Crear nuevo empleado
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->fecha_contratacion = $request->fecha_contratacion;

        // Manejar la carga de archivos
        if ($request->hasFile('titulo')) {
            $empleado->titulo = $request->file('titulo')->store('uploads/titulos', 'public');
        }
        if ($request->hasFile('diploma')) {
            $empleado->diploma = $request->file('diploma')->store('uploads/diplomas', 'public');
        }
        if ($request->hasFile('ante_penales_policia')) {
            $empleado->ante_penales_policia = $request->file('ante_penales_policia')->store('uploads/ante_penales_policia', 'public');
        }
        if ($request->hasFile('copia_dpi')) {
            $empleado->copia_dpi = $request->file('copia_dpi')->store('uploads/copia_dpi', 'public');
        }

        // Guardar otros campos
        $empleado->nombre_conyuge = $request->nombre_conyuge;
        $empleado->fecha_nacimiento_conyuge = $request->fecha_nacimiento_conyuge;
        $empleado->nombre_hijo = $request->nombre_hijo;
        $empleado->fecha_nacimiento_hijo = $request->fecha_nacimiento_hijo;

        // Manejar la foto del empleado
        if ($request->hasFile('foto_empleado')) {
            $empleado->foto_empleado = $request->file('foto_empleado')->store('uploads/fotos', 'public');
        }

        // Guardar el empleado
        $empleado->save();

        return redirect()->route('empleados.index')->with('mensaje', 'Empleado creado exitosamente');
    }

    // Mostrar el formulario para editar un empleado existente
    public function edit(Empleado $empleado)
    {
        return view('empleado.edit', compact('empleado'));
    }

    // Actualizar un empleado existente
    public function update(Request $request, Empleado $empleado)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'titulo' => 'nullable|file|mimes:pdf|max:2048',
            'diploma' => 'nullable|file|mimes:pdf|max:2048',
            'ante_penales_policia' => 'nullable|file|mimes:pdf|max:2048',
            'copia_dpi' => 'nullable|file|mimes:pdf|max:2048',
            'nombre_conyuge' => 'nullable|string|max:100',
            'fecha_nacimiento_conyuge' => 'nullable|date',
            'nombre_hijo' => 'nullable|string|max:100',
            'fecha_nacimiento_hijo' => 'nullable|date',
            'foto_empleado' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejar la subida de la foto si se proporciona
        if ($request->hasFile('foto_empleado')) {
            $foto = $request->file('foto_empleado')->store('uploads/fotos', 'public');
            $request['foto_empleado'] = $foto; // Guarda la ruta de la foto
        } else {
            unset($request['foto_empleado']); // Elimina el campo si no se proporciona
        }

        // Manejar la subida de los archivos PDF
        if ($request->hasFile('titulo')) {
            $empleado->titulo = $request->file('titulo')->store('uploads/titulos', 'public');
        }
        if ($request->hasFile('diploma')) {
            $empleado->diploma = $request->file('diploma')->store('uploads/diplomas', 'public');
        }
        if ($request->hasFile('ante_penales_policia')) {
            $empleado->ante_penales_policia = $request->file('ante_penales_policia')->store('uploads/ante_penales_policia', 'public');
        }
        if ($request->hasFile('copia_dpi')) {
            $empleado->copia_dpi = $request->file('copia_dpi')->store('uploads/copia_dpi', 'public');
        }

        // Actualizar el empleado
        $empleado->update($request->all());
        return redirect()->route('empleado')->with('mensaje', 'Empleado actualizado con éxito.');
    }

    // Eliminar un empleado
    public function destroy(Empleado $empleado)
    {
        // Eliminar el empleado
        $empleado->delete();
        return redirect()->route('empleados.index')->with('mensaje', 'Empleado eliminado con éxito.');
    }
}