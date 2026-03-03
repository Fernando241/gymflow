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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            
            // Relación con la membresía que se está pagando
            $table->foreignId('membresia_id')->constrained('membresias')->onDelete('cascade');
            
            // Relación con el usuario (Socio) que paga
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('monto', 10, 2); 
            $table->string('metodo_pago')->default('efectivo'); 
            $table->timestamp('fecha_pago')->useCurrent();
            $table->string('numero_comprobante')->nullable(); // Para recibos físicos o transferencias
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
