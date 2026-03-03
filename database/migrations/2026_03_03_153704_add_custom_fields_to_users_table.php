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
        Schema::table('users', function (Blueprint $table) {
            // Roles y Estado
            $table->enum('role', ['admin', 'empleado', 'socio'])->default('socio')->after('email');
            $table->boolean('status')->default(true)->after('role');

            // Datos de contacto del socio
            $table->string('phone')->nullable()->after('password');

            // Datos del responsable (Emergencia)}
            $table->string('emergency_contact_name')->nullable()->after('phone');
            $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'phone', 'emergency_contact_name', 'emergency_contact_phone']);
        });
    }
};
