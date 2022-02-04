<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $imagen;
    
    public $isOpen = false;
    public function render()
    {
        return view('livewire.create-post');
    }
}
