<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre'=>"Programacion",
            'descripcion'=>"Categoria para los programadores",
        ]);
        Category::create([
            'nombre'=>"Base de Datos",
            'descripcion'=>"Categoria para todo lo que tenga que ver con Base de Datos",
        ]);
        Category::create([
            'nombre'=>"Juegos",
            'descripcion'=>"Categoria para los gamers",
        ]);
        Category::create([
            'nombre'=>"Deportes",
            'descripcion'=>"Categoria de deportistas",
        ]);
        Category::create([
            'nombre'=>"Libros",
            'descripcion'=>"Categoria para los lectores",
        ]);
    }
}
