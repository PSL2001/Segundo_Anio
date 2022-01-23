<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>ucfirst($this->faker->words(4, true)),
            'descripcion'=>ucfirst($this->faker->text())
        ];
    }
}
