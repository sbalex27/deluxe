<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaBono14 extends Model
{
    use HasFactory;

    protected $table = 'planilla_bono_14';

    protected $fillable = [
        'nomina_id',
        'monto',
    ];

    public function nomina()
    {
        return $this->belongsTo(Nomina::class);
    }
}