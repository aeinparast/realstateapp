<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminCreateUser extends Component
{
    #[Validate('required|string|max:52')]
    public string $name;

    #[Validate('required|string|email|max:52')]
    public string $email;

    #[Validate('required|string|confirmed')]
    public string $password;

    public $role = 1;

    public string $password_confirmation;

    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password), // Hash the password before saving
        ]);

        // Optionally, you can reset the form or display a success message
        $this->reset(['name', 'email', 'role', 'password', 'password_confirmation']);
        session()->flash('message', 'User created successfully.');
    }

    public function render()
    {
        return view('livewire.admin-create-user');
    }
}
