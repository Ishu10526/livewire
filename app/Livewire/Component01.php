<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Component01 extends Component
{

    public function createNewUser(){
        User::create([
            "name" => "test name",
            "email" => "test@mail.com",
            "password" => "password"
        ]);
    }
    public function render()
    {
        $title = "Test";
        $users = User::all();

        return view('livewire.component01',[
            'title' => $title,
            'users' => $users
        ]);
    }
}
