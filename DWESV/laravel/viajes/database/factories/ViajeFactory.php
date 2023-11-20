<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Viaje>
 */
class ViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $titulo = $this->faker->sentence(5);
            $slug = Str::slug($titulo);
            $salida = $this->faker->dateTimeBetween('-30 days', '+30 days');
            $llegada= $this->faker->dateTimeBetween($salida, '+30 days');
        return [
            'referencia' => $this->faker->unique(true)->regexify('[A-Z]{3}[0-9]{3}'),
            'titulo' => $titulo,
            'slug' => $slug,
            'precio' => $this->faker->optional(0.2)->randomFloat(2, 0, 3500),
            'numero_participantes' => $this->faker->optional()->numberBetween(1, 500),
            'salida' => $salida,
            'llegada'=> $llegada,
            'foto' => $this->faker->imageUrl(640, 480, 'city', true),
            'descripcion' => $this->faker->optional(0.5)->text,
        ];
    }
}
