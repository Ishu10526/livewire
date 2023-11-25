<?php

namespace App\Livewire;

use Livewire\Component;

class Component01 extends Component
{

    public function addClicker(){
        dump("clicked");
    }
    public function render()
    {
        return view('livewire.component01');
    }
}
