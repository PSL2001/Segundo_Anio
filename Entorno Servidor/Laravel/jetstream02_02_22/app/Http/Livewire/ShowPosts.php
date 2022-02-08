<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ShowPosts extends Component
{
    use WithPagination;
    public $search = "";
    public $campo = "id";
    public $orden = "desc";

    //Listeners (a veces vienen con el nombre de la misma funcion EJ: render)
    protected $listeners = ['renderizarPosts' => 'render'];

    public function render()
    {
        $posts = Post::orderBy($this->campo, $this->orden)->
        where('titulo', 'like', "%{$this->search}%")
        ->orWhere('contenido', 'like', "%{$this->search}%")->paginate(3);
        return view('livewire.show-posts', compact('posts'));
    }

    public function ordenar(String $campo) {
        if ($campo == $this->campo) {
            $this->orden =($this->orden=='desc')?'asc':'desc';
        }
        $this->campo = $campo;
    }

    public function borrar(Post $post) {
        //Borro de forma fisica el archivo de imagen asociado
        Storage::delete($post->imagen);
        //Borro el Post
        $post->delete();
        //Emitimos la alerta (no hace falta renderizar la vista en este caso por que es la misma)
        $this->emit("alerta", "Post Borrado");
    }
}
