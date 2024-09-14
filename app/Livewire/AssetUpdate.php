<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\City;
use App\Services\NumeralConverter;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AssetUpdate extends Component
{
    use WithFileUploads;


    #[Validate('image|max:1024')] // 1MB Max
    public $file;

    public $assetId;
    public $title;
    public $assetType = 0;
    public $dealType = 0;
    public $buildingType = 13;
    public $price_private = 0, $price_public = 0, $price_per_meter = 0;
    public $rent = 0;
    public $notes;
    public $seller_name;
    public $seller_mobile;
    public $seller_phone;
    public $city_id = 0;
    public $map = '';
    public $facilities_list = [];
    public int $area = 0;
    public $space = 0;
    public int $floor = 0;
    public int $floors = 0;
    public int $direction = 0;
    public int $beds = 0;
    public int $wcs = 0;
    public int $cooks = 0;
    public int $cooling = 0;
    public int $heating = 0;
    public int $water = 0;
    public int $elec = 0;
    public int $gas = 0;
    public int $landline = 0;
    public int $elevator = 0;
    public int $storage = 0;
    public int $parking = 0;
    public int $fileType = 0;

    public $photos = [];


    protected $rules = [
        'title' => 'required|string|max:255',
        'assetType' => 'required|integer|min:0|max:10',  // Assuming assetType is an integer between 0-255
        'dealType' => 'required|integer|min:0|max:10',   // Assuming dealType is an integer between 0-255
        'buildingType' => 'required|integer|min:0|max:25',   // Assuming dealType is an integer between 0-255
        'price_private' => 'required|integer|min:0',       // Must be a positive integer
        'price_public' => 'required|integer|min:0',       // Must be a positive integer
        'rent' => 'required|integer|min:0',       // Must be a positive integer
        'price_per_meter' => 'required|integer|min:0',       // Must be a positive integer
        'notes' => 'nullable|string|max:5000',            // Optional, max length 5000 characters
        'seller_name' => 'required|string|max:255',       // Required, max length 255 characters
        'seller_mobile' => 'required|string|max:15',      // Required, assume max 15 characters for a mobile number
        'seller_phone' => 'nullable|string|max:15',       // Optional, assume max 15 characters for a phone number
        'city_id' => 'required|integer|max:255',              // Required, max length 255 characters
        'facilities_list' => 'nullable|array',            // Optional, must be an array
        'facilities_list.*' => 'string|max:255',          // Each facility must be a string, max length 255 characters
        'area' => 'required|integer|min:0',               // Required, must be a positive integer
        'space' => 'required|integer|min:0',               // Required, must be a positive integer
        'floor' => 'required|integer|min:0|max:255',      // Required, assume floor is an integer between 0-255
        'floors' => 'required|integer|min:0|max:255',      // Required, assume floor is an integer between 0-255
        'direction' => 'required|integer|min:0|max:255',  // Required, assume direction is an integer between 0-255
        'beds' => 'required|integer|min:0|max:255',       // Required, must be an integer between 0-255
        'wcs' => 'required|integer|min:0|max:255',         // Required, must be an integer between 0-255
        'cooks' => 'required|integer|min:0|max:255',      // Required, must be an integer between 0-255
        'cooling' => 'required|integer|min:0|max:255',    // Required, must be an integer between 0-255
        'heating' => 'required|integer|min:0|max:255',    // Required, must be an integer between 0-255
        'water' => 'required|integer|min:0|max:255',      // Required, must be an integer between 0-255
        'elec' => 'required|integer|min:0|max:255',       // Required, must be an integer between 0-255
        'gas' => 'required|integer|min:0|max:255',        // Required, must be an integer between 0-255
        'landline' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255
        'elevator' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255
        'storage' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255
        'parking' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255
        'map' => 'string|min:0|max:255',   // Required, must be an integer between 0-255
        'fileType' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255

    ];

    public function save()
    {
        $this->convertNumerals(); // Convert any non-English numerals to English

        // Validate the input data based on the defined rules
        $validatedData = $this->validate($this->rules);

        // Handle image processing (assuming $this->photos is an array of image paths)
        $validatedData['img'] = implode('*', $this->photos);

        // Attach the current user ID
        $validatedData['user_id'] = Auth::id(); // Auth::id() is cleaner and safer

        $validatedData['facilities_list'] = json_encode($this->facilities_list);

        $asset = Asset::find($this->assetId);
        $asset->fill($validatedData);
        $asset->save();

        // Redirect after saving
        return redirect()->to('/asset');
    }

    protected function convertNumerals()
    {

        $this->assetType = (int) NumeralConverter::convertToEnglish($this->assetType);
        $this->dealType = (int) NumeralConverter::convertToEnglish($this->dealType);
        $this->buildingType = (int) NumeralConverter::convertToEnglish($this->buildingType);
        $this->price_private = (int) NumeralConverter::convertToEnglish($this->price_private);
        $this->price_public = (int) NumeralConverter::convertToEnglish($this->price_public);
        $this->price_per_meter = (int) NumeralConverter::convertToEnglish($this->price_per_meter);
        $this->rent = (int) NumeralConverter::convertToEnglish($this->rent);
        $this->area = (int) NumeralConverter::convertToEnglish($this->area);
        $this->space = (int) NumeralConverter::convertToEnglish($this->space);
        $this->floor = (int) NumeralConverter::convertToEnglish($this->floor);
        $this->floor = (int) NumeralConverter::convertToEnglish($this->floor);
        $this->floors = (int) NumeralConverter::convertToEnglish($this->floors);
        $this->direction = (int) NumeralConverter::convertToEnglish($this->direction);
        $this->beds = (int) NumeralConverter::convertToEnglish($this->beds);
        $this->wcs = (int) NumeralConverter::convertToEnglish($this->wcs);
        $this->cooks = (int) NumeralConverter::convertToEnglish($this->cooks);
        $this->cooling = (int) NumeralConverter::convertToEnglish($this->cooling);
        $this->heating = (int) NumeralConverter::convertToEnglish($this->heating);
        $this->water = (int) NumeralConverter::convertToEnglish($this->water);
        $this->elec = (int) NumeralConverter::convertToEnglish($this->elec);
        $this->gas = (int) NumeralConverter::convertToEnglish($this->gas);
        $this->landline = (int) NumeralConverter::convertToEnglish($this->landline);
        $this->elevator = (int) NumeralConverter::convertToEnglish($this->elevator);
        $this->storage = (int) NumeralConverter::convertToEnglish($this->storage);
        $this->parking = (int) NumeralConverter::convertToEnglish($this->parking);
        $this->fileType = (int) NumeralConverter::convertToEnglish($this->fileType);
        $this->seller_mobile = NumeralConverter::convertToEnglish($this->seller_mobile);
        $this->seller_phone = NumeralConverter::convertToEnglish($this->seller_phone);
    }

    public function uploadImage(): void
    {
        $upload = $this->file->store('photos', 'liara');
        array_push($this->photos, $upload);
        $this->file = null;
    }

    public function deleteImage($key): void
    {
        unset($this->photos[$key]);
    }

    public function deleteFile(): void
    {
        $this->file = null;
    }

    public function setAsPrimary($key): void
    {
        if ($key === 0) {
            return;
        }
        $one = $this->photos[0];
        $two = $this->photos[$key];
        $this->photos[0] = $two;
        $this->photos[$key] = $one;
    }

    public function remove()
    {
        $asset = Asset::find($this->assetId);
        $asset->delete();
        return redirect('asset');
    }


    public function updated($propertyName)
    {
        if (in_array($propertyName, [
            'price_public',
            'price_private',
            'price_per_meter',
            'rent',
            'space',
            'area',
            'floor',
            'floors',
            'beds',
            'wcs',
            'cooks',
            'parking',
            'seller_mobile',
            'seller_phone'
        ])) {
            $this->$propertyName = NumeralConverter::convertToEnglish($this->$propertyName);
        }
    }


    public function updateBuildingType()
    {
        $this->buildingType = array_key_first(config('assetType')[$this->assetType]);
    }

    public function mount(Asset $asset)
    {
        $this->title = $asset->title;
        $this->seller_phone = $asset->seller_phone;
        $this->seller_mobile = $asset->seller_mobile;
        $this->seller_name = $asset->seller_name;
        $this->notes = $asset->notes;
        $this->assetType = (int) $asset->assetType;
        $this->dealType = (int) $asset->dealType;
        $this->buildingType = (int) $asset->buildingType;
        $this->price_private = (int) $asset->price_private;
        $this->price_public = (int) $asset->price_public;
        $this->price_per_meter = (int) $asset->price_per_meter;
        $this->rent = (int) $asset->rent;
        $this->area = (int) $asset->area;
        $this->space = (int) $asset->space;
        $this->floor = (int) $asset->floor;
        $this->floors = (int) $asset->floors;
        $this->direction = (int) $asset->direction;
        $this->beds = (int) $asset->beds;
        $this->wcs = (int) $asset->wcs;
        $this->cooks = (int) $asset->cooks;
        $this->cooling = (int) $asset->cooling;
        $this->heating = (int) $asset->heating;
        $this->water = (int) $asset->water;
        $this->elec = (int) $asset->elec;
        $this->gas = (int) $asset->gas;
        $this->landline = (int) $asset->landline;
        $this->elevator = (int) $asset->elevator;
        $this->storage = (int) $asset->storage;
        $this->parking = (int) $asset->parking;
        $this->fileType = (int) $asset->fileType;
        $this->city_id = (int) $asset->city->id;
        $this->map = $asset->map;
        $this->facilities_list = json_decode($asset->facilities_list);
        $this->photos = explode('*', $asset->img);
        $this->assetId = $asset['id'];
    }


    public function render()
    {
        $facilities = config('facilities');
        $cityAreas = City::all();
        return view('livewire.asset-update', compact(['facilities', 'cityAreas']));
    }
}
