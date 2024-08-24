<?php

namespace App\Livewire;

use Livewire\Component;

class HeroSearch extends Component
{
    public $propertyType = 99;
    public $dealType = 99;
    public $city = '*';

    public function PropertyChange($val): void
    {

        if ($this->propertyType === $val) {
            $this->propertyType = 99;
            return;
        }
        $this->propertyType = $val;
    }

    public function DealChange($val): void
    {
        if ($this->dealType === $val) {
            $this->dealType = 99;
            return;
        }
        $this->dealType = $val;
    }

    public function render()
    {
        return view('livewire.hero-search');
    }
}
