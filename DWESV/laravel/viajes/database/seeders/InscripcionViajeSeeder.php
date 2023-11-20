<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\InscripcionViaje;
use App\Models\Viaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InscripcionViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $viajesIds = Viaje::all()->pluck('id');
        $clientesIds = Cliente::all()->pluck('id');
        foreach ($viajesIds as $viajeId) {
            foreach ($clientesIds as $clienteId) {
                if(rand(0,10)>8){
                    InscripcionViaje::create([
                        'viaje_id' => $viajeId,
                        'cliente_id' => $clienteId,
                    ]);
                }
            }
        }
    }
}
