<?php

namespace App\Models;

use App\Models\Pago;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Symfony\Component\Clock\now;

class Membresia extends Model
{
    use HasFactory;

    public const STATUS_ACTIVO = 'activo';
    public const STATUS_VENCIDO = 'vencido';
    public const STATUS_CANCELADO = 'cancelado';

    protected $fillable = [
        'user_id',
        'plan_id',
        'precio_pagado',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'precio_pagado' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    /* Para ue el estado "Activo" cambie automaticamente*/

        public function esActiva(): bool
    {
        return $this->status === self::STATUS_ACTIVO
            && Carbon::now()->between(
                Carbon::parse($this->start_date), 
                Carbon::parse($this->end_date)
                );
    }

    /* lógica de membresia */
    public static function crearDesdePlan(User $user, Plan $plan): self
    {
        if ($user->role !== 'socio') {
            throw new \Exception('Solo los socios pueden tener membresía.');
        }

        // 1️⃣ Cancelar automáticamente membresías expiradas
        self::where('user_id', $user->id)
            ->where('status', self::STATUS_ACTIVO)
            ->whereDate('end_date', '<', now())
            ->update(['status' => self::STATUS_CANCELADO]);

        // 2️⃣ Verificar si aún existe una activa vigente
        $membresiaActiva = self::where('user_id', $user->id)
            ->where('status', self::STATUS_ACTIVO)
            ->exists();

        if ($membresiaActiva) {
            throw new \Exception('El usuario ya tiene una membresía activa vigente.');
        }

        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addDay($plan->duracion_dias);
        

        return self::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'precio_pagado' => $plan->precio,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => self::STATUS_ACTIVO,
        ]);
    }

    /* Lógica para ver días restantes */
    public function getDiasRestantesAttribute(): int
    {
        if ($this->status !== self::STATUS_ACTIVO) {
            return 0;
        }

        $dias = Carbon::now()->diffInDays($this->end_date, false);

        return $dias > 0 ? $dias : 0;
    }

    public function getEstaVencidaAttribute(): bool
    {
        return Carbon::now()->greaterThan($this->end_date);
    }

    public function getPrecioFormateadoAttribute(): string
    {
        return '$ ' . number_format($this->precio_pagado, 0, ',', '.');
    }

}