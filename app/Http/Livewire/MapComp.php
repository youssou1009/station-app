<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MapComp extends Component
{
    public function render()
    {
        return view('livewire.map-comp')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
