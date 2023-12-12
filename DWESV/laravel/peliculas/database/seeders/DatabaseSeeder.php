<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Alquiler;
use App\Models\Categoria;
use App\Models\Director;
use App\Models\Pelicula;
use App\Models\Socio;
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
        User::factory()->create([
            'name' => 'Ismael Ramos',
            'email' => 'ismael@gmail.com',
            'password' => Hash::make('castelar')
        ]);
        User::factory(10)->create();

        Socio::factory(20)->create();
        Director::factory(40)->create();
        Categoria::factory(40)->create();
        Pelicula::factory(40)->create();
        Alquiler::factory(40)->create();
    }
}
