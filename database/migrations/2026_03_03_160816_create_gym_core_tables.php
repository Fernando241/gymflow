<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla de planes (Mensual, trimestral, etc.)
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_plan');
            $table->decimal('precio', 8, 2);
            $table->integer('duracion_dias');
            $table->timestamps();
        });

        // Tabla de Membresias (Une Socios con planes)
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('planes')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['activo', 'vencido', 'cancelado'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
        Schema::dropIfExists('planes');
    }
};
