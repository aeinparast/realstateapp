<?php

namespace App\Livewire;

use Livewire\Component;

class HeroSearch extends Component
{
    public $propertyType = 0;
    public $dealType = 0;

    public function PropertyChange($val): void
    {
        $this->propertyType = $val;
    }

    public function DealChange($val): void
    {
        $this->dealType = $val;
    }

    public function render()
    {
        return view('livewire.hero-search');
    }
}
