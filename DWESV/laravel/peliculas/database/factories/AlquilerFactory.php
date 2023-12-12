<?php

namespace Database\Factories;

use App\Models\Pelicula;
use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alquiler>
 */
class AlquilerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $socios = Socio::pluck('id')->toArray();
        $peliculas = Pelicula::pluck('id')->toArray();
        return [
            'fecha_alquiler' => $this->faker->date('Y-m-d', 'now'),
            'fecha_devolucion' => $this->faker->date('Y-m-d', 'now'),
            'socio_id' => $this->faker->randomElement($socios),
            'pelicula_id' => $this->faker->randomElement($peliculas),
        ];
    }
}
