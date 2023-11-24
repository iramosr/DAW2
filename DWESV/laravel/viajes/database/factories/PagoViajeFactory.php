<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InscripcionViaje;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PagoViaje>
 */
class PagoViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $InscripcionViaje = InscripcionViaje::pluck('id')->toArray();
        return [
            'inscripcion_viaje_id' => $this->faker->randomElement($InscripcionViaje),
            'pagado' => $this->faker->optional(0.2)->randomFloat(2, 0, 3500),
        ];
    }
}
