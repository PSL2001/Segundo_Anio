<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\{Component, WithPagination};

class ShowUserPosts extends Component
{
    use WithPagination;

    public $campo = 'id', $orden = 'desc';
    public function render()
    {
        //auth()->user()->id devuelve el id del usuario registrado
        //desde auth->user se pueden sacar todos los datos
        $posts = Post::where('user_id', auth()->user()->id)
        ->orderBy($this->campo, $this->orden)->paginate(5);

        return view('livewire.show-user-posts', compact('posts'));
    }

    public function ordenarPor($campo) {
        if ($campo == $this->campo) {
            $this->orden = ($this->orden == 'desc') ? 'asc' : 'desc';
        }
        $this->campo = $campo;
    }

    public function borrar(Post $post) {
        //1. Borro la imagen del disco
        Storage::delete($post->imagen);
        //Borro el post
        $post->delete();
        $this->emit('borrar', 'Registro Borrado');
    }
}
