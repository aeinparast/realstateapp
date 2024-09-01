<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePfpForm extends Component
{
    use WithFileUploads;
    public $file;

    public function updatePfp()
    {
        $user = Auth::user();
        $upload = $this->file->store('photos', 'liara');
        $user->pfp = $upload;
        $user->save();
        $this->redirect('profile');
    }


    public function render()
    {
        $pfp = Auth::user()->pfp;
        return view('livewire.profile.update-pfp-form', compact('pfp'));
    }
}
