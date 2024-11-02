<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // Define los campos que se pueden llenar masivamente
    protected $fillable = [
        'empleado_id',
        'monto',
        'fecha_otorgamiento',
    ];

    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}