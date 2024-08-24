<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AssetCreate extends Component
{
    use WithFileUploads;


    #[Validate('image|max:1024')] // 1MB Max
    public $file;

    public $title;
    public $notes;
    public $seller_name;
    public $seller_mobile;
    public $seller_phone;
    public $city;

    public $photos = [];

    public function save(): void
    {
        $validator = $this->validate([
            'title' => 'required|min:3',
            'seller_name' => 'required|min:3',
            'seller_mobile' => 'required|digits:11|digits:11|starts_with:0',
            'seller_phone' => 'digits:11|digits:11|starts_with:0',
            'city' => 'required',
            'notes' => 'required',
        ]);
        $img = implode('*', $this->photos);
        $validator['img'] = $img;
        $user_id = Auth::user()->id;
        $validator['user_id'] = $user_id;
        Asset::create($validator);
    }


    public function uploadImage(): void
    {
        $upload = $this->file->store('photos', 'liara');
        // dd($upload);
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
        return view('livewire.asset-create');
    }
}
