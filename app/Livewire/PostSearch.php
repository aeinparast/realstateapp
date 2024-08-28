<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Upload;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class PostSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function __construct() {}
    public function render()
    {

        return view('livewire.post-search', [
            'assets' => Asset::paginate(12),
        ]);
    }
}
