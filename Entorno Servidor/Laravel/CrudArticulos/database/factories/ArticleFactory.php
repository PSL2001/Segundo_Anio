<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>ucfirst($this->faker->words(4, true)),
            'descripcion'=>ucfirst($this->faker->text())
        ];
    }
}
