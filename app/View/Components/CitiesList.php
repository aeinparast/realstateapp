<?php

namespace App\View\Components;

use App\Models\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CitiesList extends Component
{
    /**
     * Create a new component instance.
     */
    public $cities;
    public function __construct()
    {
        $this->cities = City::withCount(['assets' => function ($query) {
            $query->where('isPublic', true);
        }])->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cities-list', [
            'cities' => $this->cities
        ]);
    }
}
