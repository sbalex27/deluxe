<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloVenta extends Model
{
    use HasFactory;

    protected $table = 'articulos_venta'; // Especifica la tabla si no sigue la convención

    protected $fillable = [
        'nombre_articulo',
        'categoria',
        'precio',
        'cantidad_disponible',
        'fecha_disponibilidad',
        'enlace_imagen', // Agregado el campo enlace_imagen
    ];
}