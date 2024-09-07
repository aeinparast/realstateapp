<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Attributes\Url;
use Livewire\Component;

class PublicAsset extends Component
{
    #[Url]
    public $id = '';

    public Asset $asset;

    public $facilities;

    public function mount()
    {
        $asset = Asset::with(['user', 'city'])->find($this->id);
        if ($asset != null) {
            $this->asset = $asset;
        } else {
            $this->redirect('/');
        }
        $this->facilities = config('facilities');
    }


    public function render()
    {
        $pfp = $this->asset->user->pfp;
        $map = explode(',', $this->asset->map);
        $facilities_list = json_decode($this->asset['facilities_list']);
        $title = 'کاستوم';
        return view('livewire.pages.public.public-asset', compact(['facilities_list', 'pfp', 'map', 'title']))
            ->layout('layouts.public', ['title' => $this->asset->title . ' - هلدینگ سرمایه‌گذاری مهدوی']);
    }
}
