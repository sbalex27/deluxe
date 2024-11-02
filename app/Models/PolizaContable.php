<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolizaContable extends Model
{
    use HasFactory;

    protected $fillable = ['nomina_id', 'detalles'];

    public function nomina()
    {
        return $this->belongsTo(Nomina::class);
    }
}