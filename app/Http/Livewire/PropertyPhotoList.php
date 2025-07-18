<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PropertyPhoto;

class PropertyPhotoList extends Component
{
    public $property;

    public function mount($property)
    {
        $this->property = $property;
    }

    public function deletePhoto($photoId)
    {
        $this->property->photos()->where('id', $photoId)->delete();
        $this->emit('photoDeleted');
    }

    public function render()
    {
        return view('livewire.photos.list')->layout('livewire.components.layouts.app');
    }
}
