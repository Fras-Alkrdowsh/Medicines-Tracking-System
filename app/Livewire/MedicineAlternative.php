<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class MedicineAlternative extends Component
{
    public $searchInput;
    public $medicines;

    public function getAlternative()
    {
        $this->medicines = Medicine::where('name', 'like', '%'.$this->searchInput.'%')->with('alternatives')->first();
    }
    public function render()
    {
        return view('livewire.medicine-alternative');
    }
}
