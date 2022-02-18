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
    public $isOpen = false, $isOpenShow=false;
    public $imagen;

    public Post $post;
    //listeners para la vista 'listener' => 'funcion'
    //A veces lo encuentras como 'render'
    protected $listeners = ['renderizarVista'=>'render'];
    protected $rules = [
        'post.titulo'=>'',
        'post.contenido'=>['required', 'string', 'min:10'],
        'post.status'=>['required'],
        'imagen'=>['nullable', 'image', 'max:1024']
    ];

    public function mount() {
        $this->post = new Post();
    }
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
        $this->post = $post;
        $this->isOpen = true;
    }

    public function update() {
        $this->validate([
            'post.titulo'=>['required', 'string', 'min:3', 'unique:posts.titulo,'.$this->post->titulo]
        ]);
        //Queremos editar el registro
        if ($this->imagen) {
            # He subido la imagen
            //1. Borro la imagen antigua
            Storage::delete($this->post->imagen);
            $nuevaImagen = $this->imagen->store('posts');
            $this->post->imagen = $nuevaImagen;
        }
        $this->post->save();
        $this->emit('info', "Registro Actualizado");
        $this->reset('isOpen', 'imagen');
    }

    public function show(Post $post){
        $this->post=$post;
        $this->isOpenShow=true;
    }

    public function cambiarStatus(Post $post){
        $this->post=$post;
        $this->post->status=($this->post->status==1) ? 2 : 1;
        $this->post->save();
        $this->emit('info', "Se ha cambiado el estado del post");
    }
}
