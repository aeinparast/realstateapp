<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use NumberFormatter;

class AssetCreate extends Component
{
    use WithFileUploads;


    #[Validate('image|max:1024')] // 1MB Max
    public $file;


    public $title;
    public $assetType = 0;
    public $dealType = 0;
    public $buildingType;
    public int $price_private = 0, $price_public = 0;
    public int $prepaymant = 0, $rent = 0;
    public $notes;
    public $seller_name;
    public $seller_mobile;
    public $seller_phone;
    public $city;
    public $facilities_list = [];
    public int $area = 0;
    public int $space = 0;
    public int $floor = 0;
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
    public $photos = [];


    protected $rules = [
        'title' => 'required|string|max:255',
        'assetType' => 'required|integer|min:0|max:10',  // Assuming assetType is an integer between 0-255
        'dealType' => 'required|integer|min:0|max:10',   // Assuming dealType is an integer between 0-255
        'price_private' => 'required|integer|min:0',             // Must be a positive integer
        'price_public' => 'required|integer|min:0',       // Must be a positive integer
        'notes' => 'nullable|string|max:5000',            // Optional, max length 5000 characters
        'seller_name' => 'required|string|max:255',       // Required, max length 255 characters
        'seller_mobile' => 'required|string|max:15',      // Required, assume max 15 characters for a mobile number
        'seller_phone' => 'nullable|string|max:15',       // Optional, assume max 15 characters for a phone number
        'city' => 'required|string|max:255',              // Required, max length 255 characters
        'facilities_list' => 'nullable|array',            // Optional, must be an array
        'facilities_list.*' => 'string|max:255',          // Each facility must be a string, max length 255 characters
        'area' => 'required|integer|min:0',               // Required, must be a positive integer
        'floor' => 'required|integer|min:0|max:255',      // Required, assume floor is an integer between 0-255
        'direction' => 'required|integer|min:0|max:255',  // Required, assume direction is an integer between 0-255
        'beds' => 'required|integer|min:0|max:255',       // Required, must be an integer between 0-255
        'wc' => 'required|integer|min:0|max:255',         // Required, must be an integer between 0-255
        'cooks' => 'required|integer|min:0|max:255',      // Required, must be an integer between 0-255
        'cooling' => 'required|integer|min:0|max:255',    // Required, must be an integer between 0-255
        'heating' => 'required|integer|min:0|max:255',    // Required, must be an integer between 0-255
        'water' => 'required|integer|min:0|max:255',      // Required, must be an integer between 0-255
        'elec' => 'required|integer|min:0|max:255',       // Required, must be an integer between 0-255
        'gas' => 'required|integer|min:0|max:255',        // Required, must be an integer between 0-255
        'landline' => 'required|integer|min:0|max:255',   // Required, must be an integer between 0-255
    ];

    public function save(): void
    {
        dd($this->assetType);
        $validator = $this->validate([
            'title' => 'required|min:3',
            'seller_name' => 'required|min:3',
            'price_private' => 'numeric',
            'price_public' => 'required|numeric|min:0',
            'seller_mobile' => 'required|digits:11|digits:11|starts_with:0',
            'seller_phone' => 'digits:11|digits:11|starts_with:0',
            'assetType' => 'required|numeric|between:0,3',
            'notes' => 'required',
        ]);
        $img = implode('*', $this->photos);
        $validator['img'] = $img;
        $user_id = Auth::user()->id;
        $validator['user_id'] = $user_id;
        Asset::create($validator);
        $this->redirect('/asset');
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




    public function render()
    {
        $facilities = config('facilities');
        $cityAreas = config('cityAreas');

        return view('livewire.asset-create', compact(['facilities', 'cityAreas']));
    }
}
