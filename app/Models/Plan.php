<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes';

    protected $fillable = [
        'nombre_plan',
        'precio',
        'duracion_dias',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'duracion_dias' => 'integer',
    ];

    // Relación: un plan tiene muchas membresías
    public function membresias()
    {
        return $this->hasMany(Membresia::class);
    }
}