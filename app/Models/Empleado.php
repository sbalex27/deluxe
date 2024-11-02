<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si no sigue las convenciones de Laravel
    protected $table = 'empleado';

    // Permitir los campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_contratacion',
        'titulo',
        'diploma',
        'ante_penales_policia',
        'copia_dpi',
        'nombre_conyuge',
        'fecha_nacimiento_conyuge',
        'nombre_hijo',
        'fecha_nacimiento_hijo',
        'foto_empleado' // Agregar el campo para la foto del empleado
    ];

    // Si deseas desactivar los timestamps, puedes descomentar la siguiente línea:
    // public $timestamps = false;
}