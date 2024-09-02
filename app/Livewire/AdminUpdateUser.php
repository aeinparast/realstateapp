<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminUpdateUser extends Component
{
    public User $user;

    #[Validate('required|string|max:52')]
    public string $name;
    #[Validate('required|email|max:52')]
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
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->role = $this->role;
        $this->user->save();
        return redirect()->route('admin-users');
    }

    public function render()
    {
        return view('livewire.admin-update-user');
    }
}
