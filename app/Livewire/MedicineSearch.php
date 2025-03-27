<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pharmacist;

class MedicineSearch extends Component
{
    public $input;
    public $pharmacies=[];

    public function get_parmacies(){
        $this->pharmacies=Pharmacist::whereHas('medicines', function ($query) {
            $query->where('name', 'like', '%'.$this->input.'%');
        })->get();
        $this->dispatch("confirm",pharmacy: $this->pharmacies);
    }
    public function render()
    {
        return view('livewire.medicine-search');
    }
}
