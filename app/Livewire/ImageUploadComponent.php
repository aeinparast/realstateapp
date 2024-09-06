<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploadComponent extends Component
{
    use WithFileUploads;


    #[Validate('image|max:2024')] // 1MB Max
    public $file;

    public $fileUrl = '';

    public function uploadImage(): void
    {
        $upload = $this->file->store('photos', 'liara');
        $this->fileUrl = env('BUCKET_FULL_URL') . '/' . $upload;
        $this->file = null;
    }

    public function render()
    {
        return view('livewire.image-upload-component');
    }
}
