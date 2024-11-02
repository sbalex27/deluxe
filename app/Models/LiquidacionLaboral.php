<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiquidacionLaboral extends Model
{
    use HasFactory;

    protected $table = 'liquidacion_laboral';

    protected $fillable = [
        'empleado_id',
        'monto',
        'fecha_liquidacion',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}