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
            'titulo'=>$this->faker->unique()->sentence(1),
            'contenido'=>$this->faker->text(),
            'imagen'=>'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false)
        ];
    }
}
