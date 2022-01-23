<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    //Una Categoria tiene muchos articulos
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
