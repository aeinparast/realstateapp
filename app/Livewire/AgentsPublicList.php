<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AgentsPublicList extends Component
{


    public function render()
    {
        $agents = User::whereIn('role', [0, 1])->get();
        return view('livewire.agents-public-list', compact('agents'));
    }
}
