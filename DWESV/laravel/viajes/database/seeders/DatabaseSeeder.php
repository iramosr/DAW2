<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Viaje;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ismael Ramos',
            'email' => 'ismael@gmail.com',
            'password' => Hash::make('castelar')
        ]);
        User::factory(10)->create();

        /*
        Cliente::factory(50)->create();
        Empleado::factory(50)->create();
        Viaje::factory(50)->create();
        */
    }
}
