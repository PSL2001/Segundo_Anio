<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Indicamos los campos de la tabla que vamos a permitir rellenar via formulario
    protected $fillable = ['titulo', 'resumen', 'contenido']; //Ponemos los mismos nombres que en los campos de la tabla
}
