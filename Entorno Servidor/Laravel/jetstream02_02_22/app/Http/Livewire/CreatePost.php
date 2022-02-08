<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $imagen;
    public $titulo, $contenido;
    public $isOpen = false;
    protected $rules = [
        'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo'],
        'contenido'=>['required', 'string', 'min:8'],
        'imagen'=>['required', 'image', 'max:1024']
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function guardar() {
        $this->validate();
        //Hemos pasado las validaciones si no saltan errores
        //1. Guardamos la imagen (en el disco)
        $imagen = $this->imagen->store('posts');
        //2. Guardamos el registro en la base de datos
        Post::create([
            'titulo'=>ucfirst($this->titulo),
            'contenido'=>ucfirst($this->contenido),
            'imagen'=>$imagen
        ]);
        //Reiniciar las variables
        $this->reset(['isOpen', 'titulo', 'contenido']);
        //Necesito que show-posts se renderice
        //Haremos un eventListener que solo escuche show.posts (emitTo)
        //Y para las alertas un listener en todos los sitios (emit)
        $this->emitTo('show-posts', 'renderizarPosts');


        //Evento para las alertas de crear Post (la reciben todas las paginas)
        $this->emit('alerta', 'Post Creado con éxito');
    }
}
