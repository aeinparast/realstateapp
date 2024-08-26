<?php

namespace App\Livewire;

use App\Models\Asset;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class PublicAsset extends Component
{
    #[Url]
    public $id = '';

    public Asset $asset;

    public function mount()
    {
        $asset = Asset::find($this->id);
        if ($asset != null) {
            $this->asset = $asset;
        } else {
            $this->redirect('/');
        }
    }


    #[Layout('layouts.public')]
    public function render()
    {
        return view('livewire.pages.public.public-asset');
    }
}
