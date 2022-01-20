<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];

    //relacion 1:N con post
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
