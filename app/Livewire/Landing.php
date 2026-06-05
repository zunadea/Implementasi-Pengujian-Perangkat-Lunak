<?php

namespace App\Livewire;

use App\Support\ReboxLocations;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Rebox Application')]
class Landing extends Component
{
    public function render()
    {
        return view('livewire.landing', [
            'locations' => ReboxLocations::all(),
        ]);
    }
}
