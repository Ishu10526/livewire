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

        $this -> validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:5'
        ]);
        
        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ]);

        $this->reset(['name','email','password']);

        request()->session()->flash('success','User created successfully!');
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
