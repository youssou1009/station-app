<?php

namespace App\Http\Livewire;

use App\Models\Station;
use Livewire\Component;

class StationDetails extends Component
{
    public Station $station;

    public function mount($stationId){
        $this->station = Station::find($stationId);
    }

    public function render()
    {
        // dd($this->station);
        $stations = Station::with('departement.region')->latest()->get();
        return view('livewire.details.index', [
            "station" => Station::where('id', $this->station->id)->get(),
            "stations" => $stations,
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
}
