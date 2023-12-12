<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Director;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $directores = Director::pluck('id')->toArray();
        $categoria = Categoria::pluck('id')->toArray();
        return [
            'titulo' => $this->faker->sentence(3),
            'portada' => $this->faker->optional(0.8)->imageUrl(640, 480, 'abstract',true),
            'fecha_estreno' => $this->faker->date('Y-m-d', 'now + 50 years'),
            'sinopsis' => $this->faker->paragraph(),
            'director_id' =>$this->faker->randomElement($directores),
            'categoria_id' =>$this->faker->randomElement($categoria)
        ];
    }
}
