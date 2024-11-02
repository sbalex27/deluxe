<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'compras';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'empleado_id',
        'descripcion',
        'monto',
        'fecha_compra',
    ];

    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}