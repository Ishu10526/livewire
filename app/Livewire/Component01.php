<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Component01 extends Component
{

    public  $name;
    public  $email;
    public  $password;
    public function createNewUser(){
        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
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
