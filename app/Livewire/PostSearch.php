<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Upload;
use Livewire\Component;

use function Pest\Laravel\post;

class PostSearch extends Component
{
    public $assets;
    public function __construct()
    {
        $this->assets = Asset::all();
    }
    public function render()
    {

        return view('livewire.post-search',);
    }
}
