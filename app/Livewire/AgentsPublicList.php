<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AgentsPublicList extends Component
{
    public function render()
    {
        $agents = User::all();
        return view('livewire.agents-public-list', compact('agents'));
    }
}
