<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'nombre'=>"General",
            'descripcion'=>"Etiqueta para inclasificable",
            'color'=>"#1e88e5"
        ]);
        Tag::create([
            'nombre'=>"Frontend",
            'descripcion'=>"Etiqueta para desarrollo web en el frontend",
            'color'=>"#388e3c"
        ]);
        Tag::create([
            'nombre'=>"Backend",
            'descripcion'=>"Etiqueta para desarrollo web en el backend",
            'color'=>"#ffa000"
        ]);
        Tag::create([
            'nombre'=>"Estilos",
            'descripcion'=>"Etiqueta de estilos web, tailwind, boostrap, css, etc",
            'color'=>"#6a1b9a"
        ]);
    }
}
