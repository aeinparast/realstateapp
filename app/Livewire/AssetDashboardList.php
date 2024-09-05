<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AssetDashboardList extends Component
{
    use WithPagination;


    public function publish($key)
    {
        $asset = Asset::find($key);
        $asset->isPublic = 1;
        $asset->save();
        return $this->redirect('asset');
    }


    public function render()
    {
        if (Auth::user()->role == 0) {
            return view('livewire.asset-dashboard-list', [
                'star' => '*',
                'assets' => Asset::with('city') // Eager load the city relationship
                    ->orderBy('created_at', 'desc')
                    ->paginate(30),
            ]);
        } else {
            return view('livewire.asset-dashboard-list', [
                'star' => '*',
                'assets' => Auth::user()->assets()
                    ->with('city') // Eager load the city relationship
                    ->orderBy('created_at', 'desc')
                    ->paginate(30),
            ]);
        }
    }
}
