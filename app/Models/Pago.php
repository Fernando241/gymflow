<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'membresia_id',
        'user_id',
        'monto',
        'metodo_pago',
        'fecha_pago',
        'numero_comprobante',
    ];

    // Un pago pertenece a una membresía
    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    // Un pago pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}