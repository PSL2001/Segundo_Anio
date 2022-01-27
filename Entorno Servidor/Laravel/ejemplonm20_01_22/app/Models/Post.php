<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'resumen', 'contenido', 'imagen', 'category_id'];

    //relacion 1:N con categories
    public function category() {
        return $this->belongsTo(Category::class);
    }

    //Relacion N:M con tags un posts tendra varios tags
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }


    //Scope para la barra de busqueda de index
    public function scopeTitulo($query, $v) {
        if (isset($v)) {
            return $query->where('titulo', 'like', "%$v%");
        }
        return $query->where('titulo', 'like', '%');

    }

    //Scope para el select de Category_Id de index
    public function scopeCategory_id($query, $v) {
        if ($v == "-10") {
            return $query->where('category_id', 'like', '%');
        }
        return $query->where('category_id', $v);
    }
}
