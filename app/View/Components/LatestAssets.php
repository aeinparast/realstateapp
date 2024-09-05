<?php

namespace App\View\Components;

use App\Models\Asset;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestAssets extends Component
{
    /**
     * Create a new component instance.
     */
    public $assets;
    public function __construct()
    {
        $this->assets = Asset::select('id', 'title', 'assetType', 'dealType', 'price_public', 'city', 'img', 'rent', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.latest-assets', [
            'assets' => $this->assets
        ]);
    }
}
