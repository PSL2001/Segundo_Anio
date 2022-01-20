<?php

namespace Database\Factories;

use App\Models\Category;
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
            'contenido'=>$this->faker->text(250),
            'category_id'=>Category::all()->random()->id,
            'imagen'=>"posts/".$this->faker->image('public/storage/posts', 640, 480, null, false)
            //posts/nombreimagen.png
            //si false -> uno.jpg si true -> public/storage/posts/uno.jpg
        ];
    }
}
