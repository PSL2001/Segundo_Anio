<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'imagen', 'user_id', 'status'];

    //Post tiene una relacion 1:N con users (1 post pertenece a 1 usuario)
    public function user() {
        return $this->belongsTo(User::class);
    }
}
