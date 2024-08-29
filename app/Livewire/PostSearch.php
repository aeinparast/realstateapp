<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Upload;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class PostSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $assetType = '';  // You can keep this public for binding.
    public $dealType = '';
    public $minPrice = '0';
    public $maxPrice = '9999999999';





    public function checkType()
    {
        $val = $this->assetType;
        if (!is_numeric($val) || $val < 0 || $val > 4) {
            $this->assetType = '';
        }
    }

    public function checkDeal()
    {
        $val = $this->dealType;
        if (!is_numeric($val) || $val < 0 || $val > 4) {
            $this->dealType = '';
        }
    }

    public function setPrice()
    {
        $this->minPrice = is_numeric($this->minPrice) ? $this->minPrice : 0;
        $this->maxPrice = is_numeric($this->maxPrice) ? $this->maxPrice : 9999999999;
    }

    public function render()
    {
        $this->checkType();
        $this->checkDeal();
        $query = Asset::query();

        if ($this->assetType !== '') {
            $query->where('type',  (int)$this->assetType);
        }

        if ($this->dealType !== '') {
            $query->where('type',  $this->assetType);
        }

        if ($this->minPrice !== null && $this->maxPrice !== null) {
            $query->whereBetween('price_public', [(int)$this->minPrice, (int)$this->maxPrice]);
        }

        return view('livewire.post-search', [
            'assets' => $query->paginate(13),
        ]);
    }
}
