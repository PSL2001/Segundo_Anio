<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'category_id'];

    //Un post pertenece a una categoria
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
