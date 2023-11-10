<?php

namespace Database\Factories;

use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    protected $model = Articulo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref' => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'descripcion' => $this->faker->sentence(5),
            'precio' => $this->faker->randomFloat(2, 0, 500),
            'observaciones' => $this->faker->paragraph,
        ];
    }
}
