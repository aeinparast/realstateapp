<?php

namespace App\Livewire;

use App\Models\City;
use Livewire\Component;

class HeroSearch extends Component
{
    public $propertyType = '';
    public $dealType = '';
    public $city = '';
    public $cities;

    public function PropertyChange($val): void
    {

        if ($this->propertyType === $val) {
            $this->propertyType = '';
            return;
        }
        $this->propertyType = $val;
    }

    public function DealChange($val): void
    {
        if ($this->dealType === $val) {
            $this->dealType = '';
            return;
        }
        $this->dealType = $val;
    }

    public function mount()
    {
        $this->cities = City::all();
    }

    public function sendurl()
    {
        $query = '';
        $hasSomething = false;
        if ($this->propertyType != '') {
            $query .= '?at=' . $this->propertyType;
            $hasSomething = true;
        }
        if ($this->dealType != '') {
            if ($hasSomething) {
                $query .= '&dt=' . $this->dealType;
            } else {
                $query .= '?dt=' . $this->dealType;
            }
            $hasSomething = true;
        }
        if ($this->city != '') {
            if ($hasSomething) {
                $query .= '&city=' . $this->city;
            } else {
                $query .= '?city=' . $this->city;
            }
            $hasSomething = true;
        }
        $this->redirect('/amlak' . $query);
    }

    public function render()
    {
        return view('livewire.hero-search');
    }
}
