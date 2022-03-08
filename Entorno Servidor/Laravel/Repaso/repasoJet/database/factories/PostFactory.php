<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->unique()->word(),
            'descripcion'=>$this->faker->text(),
            'imagen'=>'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false),
            'category_id'=>Category::all()->random()->id
        ];
    }
}
