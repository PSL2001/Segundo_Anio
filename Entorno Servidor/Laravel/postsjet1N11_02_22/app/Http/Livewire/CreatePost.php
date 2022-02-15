<?php

namespace App\Http\Livewire;

use Livewire\{Component, WithFileUploads};

class CreatePost extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $imagen;


    public function render()
    {
        return view('livewire.create-post');
    }
}
