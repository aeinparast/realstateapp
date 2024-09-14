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

    public function setDescription()
    {
        $dealType = '';
        $assetType = '';
        switch ($this->asset->dealType) {
            case 0:
                $dealType = 'فروش';
                break;
            case 1:
                $dealType = 'پروژه';
                break;
            case 2:
                $dealType = 'اجاره';
                break;
            default:
                $dealType = 'رهن';
                break;
        }

        switch ($this->asset->assetType) {
            case 0:
                $assetType = 'زمین';
                break;
            case 1:
                $assetType = 'خانه';
                break;
            case 2:
                $assetType = 'ویلا';
                break;
            default:
                $assetType = 'تجاری';
                break;
        }

        return $dealType . ' ' . $assetType . ' در '  . $this->asset->city->name;
    }

    public function setKeywords()
    {
        $dealType = '';
        $assetType = '';
        switch ($this->asset->dealType) {
            case 0:
                $dealType = 'فروش';
                break;
            case 1:
                $dealType = 'پروژه';
                break;
            case 2:
                $dealType = 'اجاره';
                break;
            default:
                $dealType = 'رهن';
                break;
        }

        switch ($this->asset->assetType) {
            case 0:
                $assetType = 'زمین';
                break;
            case 1:
                $assetType = 'خانه';
                break;
            case 2:
                $assetType = 'ویلا';
                break;
            default:
                $assetType = 'تجاری';
                break;
        }

        return $dealType . ' ' . $assetType . ','  . $this->asset->city->name . ',' .
            config('assetType')[$this->asset->assetType][$this->asset->buildingType] . ' در ' . $this->asset->city->name .
            ',املاک مهدوی';
    }


    public function render()
    {
        $pfp = $this->asset->user->pfp;
        $map = explode(',', $this->asset->map);
        $facilities_list = json_decode($this->asset['facilities_list']);
        $title = 'کاستوم';
        return view('livewire.pages.public.public-asset', compact(['facilities_list', 'pfp', 'map', 'title']))
            ->layout('layouts.public', [
                'title' => $this->asset->title . ' | هلدینگ سرمایه‌گذاری مهدوی',
                'description' => $this->setDescription(),
                'keywords' => $this->setKeywords()
            ]);
    }
}
