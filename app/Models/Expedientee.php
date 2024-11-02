<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Si el nombre de la tabla es diferente de "empleados", descomenta la siguiente línea
    // protected $table = 'nombre_de_tu_tabla';

    // Definir los campos que se pueden llenar de forma masiva
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
        'foto_empleado',
    ];

    // Si usas timestamps (created_at y updated_at), asegúrate de que estén habilitados
    public $timestamps = true;

    // Si necesitas definir relaciones, puedes hacerlo aquí. Por ejemplo:
    // public function expedientes() {
    //     return $this->hasMany(Expediente::class);
    //
}