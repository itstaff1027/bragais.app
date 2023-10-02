<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class CreateUser extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|max:255',
    ];

    public function store()
    {
        $this->validate();
        
        DB::table('users')->insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Reset form input fields.
        $this->reset(['name', 'email', 'password']);
    }

    public function render()
    {
        return view('livewire.create-user', [
            'users' => User::all()
        ]);
    }
}
