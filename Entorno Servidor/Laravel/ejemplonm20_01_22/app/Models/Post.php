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
}
