<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>ucfirst($this->faker->unique()->words(4, true)),
            'resumen'=>$this->faker->sentence(),
            'contenido'=>$this->faker->text(100)
        ];
    }
}
