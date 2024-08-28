<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;

class AssetDashboardList extends Component
{
    use WithPagination;



    public function render()
    {
        return view('livewire.asset-dashboard-list', [
            'star' => '*',
            'assets' => Asset::paginate(15),
        ]);
    }
}
