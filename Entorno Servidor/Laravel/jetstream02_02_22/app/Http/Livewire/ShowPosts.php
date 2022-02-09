<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\{WithPagination, WithFileUploads};
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ShowPosts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = "";
    public $campo = "id";
    public $orden = "desc";
    public $isOpen = false;
    public Post $post;
    public $imagen;

    //Listeners (a veces vienen con el nombre de la misma funcion EJ: render)
    protected $listeners = ['renderizarPosts' => 'render'];
    protected $rules = [
        'post.titulo'=> "",
        'post.contenido'=> ['required', 'string', 'min:8'],
        'imagen'=>['nullable', 'image', 'max:1024']
    ];

    //Carga la clase
    public function mount() {
        //Hay que instanciar un post cuando se vaya a actualizar, ademas de tener las validaciones completas
        $this->post = new Post;
    }

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

    public function mostrarEdit(Post $post) {
        $this->isOpen = true;
        $this->post = $post;
    }
    //Metodo que realmente actualiza el registro
    public function update() {
        //Validamos
        $this->validate([
            'post.titulo'=>['required', 'string', 'unique:posts,titulo,'.$this->post->id]
        ]);
        //Comprobamos si se ha subido una imagen
        //Si se da ese caso hay que borrar la antigua
        if ($this->imagen) {
            //Borramos la antigua imagen
            Storage::delete($this->post->imagen);
            //Guardamos la nueva
            $imagen = $this->imagen->store('posts');
            $this->post->imagen = $imagen;
        }
        $this->post->save();
        $this->reset(['isOpen', 'imagen']);
        $this->emit("alerta", "Post modificado con exito");
    }
}
