<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class PostSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $assetType = '';
    public $dealType = '';
    public $minPrice = '0';
    public $maxPrice = '9999999999';

    // Check if assetType is valid
    public function checkType()
    {
        if (!is_numeric($this->assetType) || $this->assetType < 0 || $this->assetType > 4) {
            $this->assetType = ''; // Reset to empty if invalid
        }
    }

    // Check if dealType is valid
    public function checkDeal()
    {
        if (!is_numeric($this->dealType) || $this->dealType < 0 || $this->dealType > 4) {
            $this->dealType = ''; // Reset to empty if invalid
        }
    }

    // Set price range, ensuring min and max are numeric
    public function setPrice()
    {
        $this->minPrice = is_numeric($this->minPrice) ? $this->minPrice : 0;
        $this->maxPrice = is_numeric($this->maxPrice) ? $this->maxPrice : 9999999999;
    }

    // Render the component
    public function render()
    {
        // Validate filters
        $this->checkType();
        $this->checkDeal();
        $this->setPrice();

        // Initialize the query
        $query = Asset::select('id', 'title', 'assetType', 'dealType', 'price_public', 'city', 'img');


        // Apply filters based on assetType
        if ($this->assetType !== '') {
            $query->where('assetType', (int)$this->assetType);
        }

        // Apply filters based on dealType
        if ($this->dealType !== '') {
            $query->where('dealType', (int)$this->dealType);
        }

        // Apply filters based on price range
        if ($this->minPrice !== null && $this->maxPrice !== null) {
            $query->whereBetween('price_public', [(int)$this->minPrice, (int)$this->maxPrice]);
        }

        // Return the view with paginated results
        return view('livewire.post-search', [
            'assets' => $query->paginate(13),
        ]);
    }
}
