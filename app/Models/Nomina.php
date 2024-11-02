<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $table = 'nomina'; // Especifica el nombre de la tabla

    protected $fillable = ['empleado_id', 'salario', 'fecha_pago'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}