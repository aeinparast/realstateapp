<?php

namespace App\Livewire;

use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AssetDashboardList extends Component
{
    use WithPagination;




    public function render()
    {

        if (Auth::user()->role == 0) {
            return view('livewire.asset-dashboard-list', [
                'star' => '*',
                'assets' => Asset::paginate(30),
            ]);
        } else {
            return view('livewire.asset-dashboard-list', [
                'star' => '*',
                'assets' => Auth::user()->assets()->paginate(30),
            ]);
        }
    }
}
