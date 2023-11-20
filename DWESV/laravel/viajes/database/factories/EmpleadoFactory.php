<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nif' => $this->faker->unique()->regexify('[0-9]{8}[A-Z]{1}'),
            'nombre' => $this->faker->firstName(),
            'apellido1' => $this->faker->lastName(),
            'apellido2' => $this->faker->optional(0.8)->lastName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', 'now'),
            'foto' => $this->faker->optional(0.8)->imageUrl(640, 480, 'people',true),
            'observaciones' => $this->faker->optional(0.8)->paragraph(),
        ];
    }
}
