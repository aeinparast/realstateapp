<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;

class PublicSearchItem extends Component
{
    public Asset $asset;
    public function render()
    {
        return view('livewire.public-search-item');
    }
}
