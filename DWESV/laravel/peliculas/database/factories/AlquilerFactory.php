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
        $fechaAlquiler = $this->faker->dateTimeBetween('now', '+1 month');
        return [
            'fecha_alquiler' => $fechaAlquiler,
            'fecha_devolucion' => $this->faker->optional(0.8)->dateTimeBetween($fechaAlquiler, '+1 year'),
            'socio_id' => $this->faker->randomElement($socios),
            'pelicula_id' => $this->faker->randomElement($peliculas),
        ];
    }
}
