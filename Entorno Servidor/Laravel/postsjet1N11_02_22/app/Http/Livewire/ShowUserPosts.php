<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\{Component, WithPagination, WithFileUploads};

class ShowUserPosts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $campo = 'id', $orden = 'desc';
    public $isOpen = false;
    //listeners para la vista 'listener' => 'funcion'
    //A veces lo encuentras como 'render'
    protected $listeners = ['renderizarVista'=>'render'];

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
    public function editar(Post $post) {
        $this->isOpen = true;
    }
}
