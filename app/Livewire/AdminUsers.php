<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminUsers extends Component
{
    public function goToUpdatePage($userId)
    {
        return redirect()->route('admin-users-update', ['user' => $userId]);
    }
    public function render()
    {
        $users = User::whereIn('role', [1, 2])->get();
        return view('livewire.admin-users', compact('users'));
    }
}
