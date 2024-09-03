<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminUpdateUser extends Component
{
    public User $user;

    public string $name;
    public string $email;

    public $role;

    #[Validate('required|string|confirmed')]
    public string $password;

    public string $password_confirmation;


    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $validData = $this->validate([
            'name' => 'required|string|max:52',
            'email' => 'required|email|max:52',
            'role' => 'required|between:0,2'
        ]);
        $this->user->fill($validData);
        $this->dispatch('user-updated',);
        $this->user->save();
    }

    public function updatePassword()
    {
        $validated = $this->validate([
            'password' => 'required|string|confirmed'
        ]);

        $this->user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('password', 'password_confirmation');
        $this->dispatch('user-password-updated');
    }

    public function render()
    {
        return view('livewire.admin-update-user');
    }
}
