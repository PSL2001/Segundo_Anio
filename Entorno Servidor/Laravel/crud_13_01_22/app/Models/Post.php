<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'resumen', 'contenido', 'category_id'];
    //Indicamos a cada post pertenece a una unica categoria
    public function category() {
        return $this->belongsTo(Category::class); //Hay que hacer relaciones a las tablas de esta manera: Plural para la N y singular para 1
    }
}
