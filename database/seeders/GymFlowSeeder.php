<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class GymFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES');

        // 1. Crear Planes
        DB::table('planes')->insert([
            ['nombre_plan' => 'Plan Mensual', 'precio' => 50000.00, 'duracion_dias' => 30],
            ['nombre_plan' => 'Plan Trimestral', 'precio' => 135000.00, 'duracion_dias' => 90],
            ['nombre_plan' => 'Plan Anual', 'precio' => 500000.00, 'duracion_dias' => 365],
        ]);

        // 2. Usuarios fijos (Admin y Empleado)
        User::create([
            'name' => 'Admin GymFlow',
            'email' => 'admin@gymflow.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '3001234567',
        ]);

        User::create([
            'name' => 'Recepción Juan',
            'email' => 'empleado@gymflow.com',
            'password' => Hash::make('empleado123'),
            'role' => 'empleado',
            'phone' => '3007654321',
        ]);

        // 3. Sembrar 50 Socios
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('socio123'),
                'role' => 'socio',
                'phone' => $faker->phoneNumber,
                'emergency_contact_name' => $faker->name,
                'emergency_contact_phone' => $faker->phoneNumber,
                'status' => $faker->boolean(80),
            ]);
        }
    } 
} 