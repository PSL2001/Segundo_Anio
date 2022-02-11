<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
            'titulo'=>$this->faker->unique()->sentence(),
            'contenido'=>$this->faker->text(),
            'status'=>random_int(1,2), //random_int es de PHP (se puede utilizar numberBetween)
            'imagen'=>'posts/'.$this->faker->image('public/storage/posts', 640, 480, null, false),
            'user_id'=>User::all()->random()->id
        ];
    }
}
