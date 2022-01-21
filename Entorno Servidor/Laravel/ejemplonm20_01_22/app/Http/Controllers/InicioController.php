<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('welcome', compact('posts'));
    }
}
