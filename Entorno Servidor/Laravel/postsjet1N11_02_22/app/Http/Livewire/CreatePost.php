<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\{Component, WithFileUploads};

class CreatePost extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $imagen;
    public $titulo, $contenido, $status;
    protected $rules = [
        'titulo'=>['required', 'string', 'min:3', 'unique:posts,titulo'],
        'contenido'=>['required', 'string', 'min:10'],
        'status'=>['required'],
        'imagen'=>['required', 'image', 'max:1024']
    ];


    public function render()
    {
        return view('livewire.create-post');
    }

    public function guardar() {
        $this->validate(); //Busca la variable rules
        //Si paso de aqui todo ha ido bien, guardamos
        //Guardamos fisicamente la imagen
        $imagen = $this->imagen->store('posts');
        //Guardamos el registro
        Post::create([
            'titulo'=>$this->titulo,
            'contenido'=>$this->contenido,
            'status'=>$this->status,
            'imagen'=>$imagen,
            'user_id'=>auth()->user()->id
        ]);
        $this->reset(['isOpen', 'titulo', 'imagen', 'contenido', 'status']);
        $this->emitTo('show-user-posts', 'renderizarVista');
        $this->emit('info', "Registro Creado");
    }
}
