<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\City;
use App\Services\NumeralConverter;
use Livewire\Component;
use Livewire\WithPagination;

class AssetDashboardList extends Component
{
    use WithPagination;

    public $cityAreas;
    public $title = '';
    public $seller_name = '';
    public $seller_mobile = '';
    public $seller_phone = '';
    public $city_id = '';
    public $assetType = '';
    public $dealType = '';
    public $buildingType = '';
    public $fileType = '';
    public $public = '';
    public $price_min = 0;
    public $price_max = 999999999999;
    public $rent_min = 0;
    public $rent_max = 999999999999;

    public $space = '';
    public $storage = '';
    public $elevator = '';
    public $area = '';
    public $wcs = '';
    public $cooks = '';
    public $parking = '';
    public $beds = '';



    public function publish($key)
    {
        $asset = Asset::find($key);
        $asset->isPublic = 1;
        $asset->save();
        return $this->redirect('asset');
    }


    public function mount()
    {
        $this->cityAreas = City::all();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, [
            'price_min',
            'price_max',
            'rent_min',
            'rent_max',
            'seller_mobile',
            'seller_phone',
            'space',
            'area',
            'beds',
            'wcs',
            'cooks',
            'parking'
        ])) {
            $this->$propertyName = NumeralConverter::convertToEnglish($this->$propertyName) == 0 ? '' : NumeralConverter::convertToEnglish($this->$propertyName);
        }
    }


    public function render()
    {
        $query = Asset::select()->with('city');
        if ($this->title != '') {
            $query->where('title', 'LIKE', '%' . $this->title . '%');
        }
        if ($this->seller_name != '') {
            $query->where('seller_name', 'LIKE', '%' . $this->seller_name . '%');
        }
        if ($this->seller_mobile != '') {
            $query->where('seller_mobile', 'LIKE', '%' . $this->seller_mobile . '%');
        }
        if ($this->seller_phone != '') {
            $query->where('seller_phone', 'LIKE', '%' . $this->seller_phone . '%');
        }
        if ($this->city_id != '') {
            $query->where('city_id', $this->city_id);
        }
        if ($this->assetType != '') {
            $query->where('assetType', $this->assetType);
        }
        if ($this->dealType != '') {
            $query->where('dealType', $this->dealType);
        }
        if ($this->buildingType != '') {
            $query->where('buildingType', $this->buildingType);
        }
        if ($this->fileType != '') {
            $query->where('fileType', $this->fileType);
        }
        if ($this->public != '') {
            $query->where('isPublic', $this->public);
        }

        if ($this->space != '') {
            $query->whereBetween('space', [(int)($this->space - 25), ($this->space + 25)]);
        }

        if ($this->area != '') {
            $query->whereBetween('area', [(int)($this->area - 25), ($this->area + 25)]);
        }

        if ($this->beds != '') {
            $query->where('beds', $this->beds);
        }

        if ($this->wcs != '') {
            $query->where('wcs', $this->wcs);
        }

        if ($this->parking != '') {
            $query->where('parking', $this->parking);
        }

        if ($this->storage != '') {
            $query->where('storage', $this->storage);
        }

        if ($this->elevator != '') {
            $query->where('elevator', $this->elevator);
        }

        if ($this->cooks != '') {
            $query->where('cooks', $this->cooks);
        }


        $query->whereBetween('price_public', [(int)$this->price_min, (int)$this->price_max]);
        $query->whereBetween('rent', [(int)$this->rent_min, (int)$this->rent_max]);

        $query->orderBy('created_at', 'desc');
        return view('livewire.asset-dashboard-list', [
            'star' => '*',
            'assets' => $query->paginate(30)
        ]);
    }
}
