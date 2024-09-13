<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\City;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class PostSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Url]
    public $city = '';

    #[Url]
    public $agent = '';

    #[Url]
    public $at = '';

    #[Url]
    public $dt = '';

    public ?User $agentInfo = null;

    public $City;
    public $bt = '';
    public $assetType = '';
    public $dealType = '';
    public $minPrice = '0';
    public $maxPrice = '99999999999';
    public $rentMinPrice = '0';
    public $rentMaxPrice = '99999999999';

    public $beds = '';
    public $parking = '';
    public $storage = '';
    public $wcs = '';
    public $elevator = '';



    public $cities;

    public function mount()
    {
        $this->cities = City::all();
        if ($this->at !== '' && is_numeric($this->at)) {
            $this->assetType = $this->at;
        }
        if ($this->dt !== '' && is_numeric($this->dt)) {
            $this->dealType = $this->dt;
        }
    }

    public function changeCity()
    {        // Apply filters based on assetType
        if ($this->City !== '' && is_numeric($this->City)) {
            $local_city = City::where('id', (int)$this->City)->first();
            $this->city = $local_city->id;
            return;
        }
        $this->city = '';
    }

    public function clearAgent()
    {
        $this->agent = '';
        $this->agentInfo = null;
    }

    public function changeAsset()
    {
        $this->bt = '';
    }

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

    public function checkBT()
    {
        if (!is_numeric($this->bt) || $this->bt < 0 || $this->dealType > 15) {
            $this->bt = ''; // Reset to empty if invalid
        }
    }

    public function checkOthers()
    {
        $this->elevator = is_numeric($this->elevator) ? $this->elevator : '';
        $this->parking = is_numeric($this->parking) ? $this->parking : '';
        $this->storage = is_numeric($this->storage) ? $this->storage : '';
        $this->wcs = is_numeric($this->wcs) ? $this->wcs : '';
    }

    // Set price range, ensuring min and max are numeric
    public function setPrice()
    {
        $this->minPrice = is_numeric($this->minPrice) ? $this->minPrice : 0;
        $this->maxPrice = is_numeric($this->maxPrice) ? $this->maxPrice : 99999999999;
        $this->rentMinPrice = is_numeric($this->rentMinPrice) ? $this->rentMinPrice : 0;
        $this->rentMaxPrice = is_numeric($this->rentMaxPrice) ? $this->rentMaxPrice : 99999999999;
    }

    // Render the component
    public function render()
    {

        // Validate filters
        $this->checkType();
        $this->checkDeal();
        $this->checkOthers();
        $this->checkBT();
        $this->setPrice();
        // $this->checkOthers();
        if (!empty($this->agent) && is_numeric($this->agent)) {
            // Find the user by ID (assuming $this->agent is the user ID)
            $loc = User::where('id', (int)$this->agent)->first();

            if ($loc) {
                $this->agentInfo = $loc;
            } else {
                $this->agentInfo = null;
            }
        }


        // Initialize the query
        $query = Asset::select('id', 'title', 'assetType', 'dealType', 'price_public', 'city_id', 'user_id', 'img', 'rent', 'parking', 'wcs', 'storage', 'elevator', 'created_at')
            ->with('city');

        $query->where('isPublic', 1);
        $query->where('fileType', 1);

        // Apply filters based on assetType
        if ($this->city !== '' && is_numeric($this->city)) {

            $this->City = $this->city;
            $query->where('city_id', (int)$this->city);
        }

        // Apply filters based on agent
        if ($this->agent !== '' && is_numeric($this->agent)) {

            $query->where('user_id', (int)$this->agent);
        }


        // Apply filters based on assetType
        if ($this->assetType !== '') {
            $query->where('assetType', (int)$this->assetType);
        }

        if ($this->bt !== '') {
            $query->where('buildingType', (int)$this->bt);
        }

        // Apply filters based on dealType
        if ($this->dealType !== '') {
            $query->where('dealType', (int)$this->dealType);
        }

        if ($this->elevator !== '') {
            $query->where('elevator', (int)$this->elevator);
        }

        if ($this->parking !== '') {
            $query->where('parking', (int)$this->parking);
        }

        if ($this->storage !== '') {
            $query->where('storage', (int)$this->storage);
        }

        if ($this->wcs !== '') {
            $query->where('wcs', (int)$this->wcs);
        }

        // Apply filters based on price range
        if ($this->minPrice !== null && $this->maxPrice !== null) {
            $query->whereBetween('price_public', [(int)$this->minPrice, (int)$this->maxPrice]);
        }

        // Apply filters based on price range
        if ($this->rentMinPrice !== null && $this->rentMaxPrice !== null) {
            $query->whereBetween('rent', [(int)$this->rentMinPrice, (int)$this->rentMaxPrice]);
        }



        $query->orderBy('created_at', 'desc');
        // Return the view with paginated results
        return view('livewire.post-search', [
            'cities' => $this->cities,
            'assets' => $query->paginate(6),
        ]);
    }
}
