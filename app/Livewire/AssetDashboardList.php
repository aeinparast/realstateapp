<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;

class AssetDashboardList extends Component
{
    public $assets;

    public function mount()
    {
        $this->assets = Asset::all();
    }
    public function render()
    {
        return view('livewire.asset-dashboard-list');
    }
}
