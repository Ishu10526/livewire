<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Component01 extends Component
{

    use WithPagination;

    public  $name;
    public  $email;
    public  $password;
    public $selectedUserId = null; 
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

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|min:3|max:20',
            'email' => "required|email|unique:users,email,{$this->selectedUserId}",
            'password' => 'required|min:5'
        ]);

        $user = User::findOrFail($this->selectedUserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->reset(['name', 'email', 'password', 'selectedUserId']);

        session()->flash('success', 'User updated successfully!');
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        session()->flash('success', 'User deleted successfully!');
    }
    
    public function selectUserForUpdate($userId)
    {
        $user = User::findOrFail($userId);
        $this->selectedUserId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = ''; // You may choose not to pre-fill the password for security reasons
    }


    public function render()
    {
        $title = "Test";
        $users = User::paginate(3);

        return view('livewire.component01',[
            'title' => $title,
            'users' => $users
        ]);
    }
}
