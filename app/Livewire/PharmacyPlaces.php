<?php

namespace App\Livewire;

use App\Models\Pharmacist;
use Livewire\Component;

class PharmacyPlaces extends Component
{
    public $searchInput;
    public $pharmacies;

    public function getPharmacy()
    {
        $this->pharmacies = Pharmacist::where('name', 'like', '%'.$this->searchInput.'%')->with('services')->first();
        $this->dispatch("confirm",pharmacy: $this->pharmacies);


    }
    public function render()
    {
        return view('livewire.pharmacy-places');
    }
}
