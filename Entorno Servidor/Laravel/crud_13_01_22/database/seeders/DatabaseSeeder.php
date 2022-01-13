<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class); //Asi se llama un seeder de una tabla
        \App\Models\Post::factory(100)->create(); //El orden de como creas las tablas importa, ya que si hacemos esto al reves, no funciona
    }
}
