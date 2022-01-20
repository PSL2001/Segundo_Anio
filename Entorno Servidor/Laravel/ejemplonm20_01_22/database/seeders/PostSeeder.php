<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Primero guardamos los post que se crean
       $misPosts = \App\Models\Post::factory(100)->create();
       //Cojemos las id's de tags y lo pasamos a array
       $tagsId = Tag::pluck('id')->toArray();
       foreach ($misPosts as $post) {
           //Ahora para cada post cojemos del array un random entre 1 y el total de tags
           $a = array_slice($tagsId, 0, random_int(1, count($tagsId)));
           //Y lo ponemos en los tags
           $post->tags()->attach($a);
       }
    }
}
