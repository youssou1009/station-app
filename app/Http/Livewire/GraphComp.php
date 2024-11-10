<?php

namespace App\Http\Livewire;

use App\Models\Station;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GraphComp extends Component
{
    public Station $station;
    public $monthlyPluviometrieData = [];
    public $monthlyTemperatureData = [];

    public function mount($stationId)
    {
        
        $this->station = Station::find($stationId);
        
        // Vérifiez si la station a été trouvée avant de continuer
        if ($this->station) {
            // Récupérez les données de pluviométrie et de température groupées par mois et année
            $monthlyData = $this->station->mesures()
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(pluviometrie) as total_pluviometrie, SUM(temperature) as total_temperature')
                ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
                ->orderBy('year')
                ->orderBy('month')
                ->get();

            // Créez une structure de données pour stocker les valeurs mensuelles et annuelles
            $monthlyPluviometrie = [];
            $monthlyTemperature = [];

            foreach ($monthlyData as $data) {
                $monthlyPluviometrie[$data->year][$data->month] = $data->total_pluviometrie;
                $monthlyTemperature[$data->year][$data->month] = $data->total_temperature;
            }

            // Remplir les données manquantes avec des zéros
            $this->fillMissingMonths($monthlyPluviometrie);
            $this->fillMissingMonths($monthlyTemperature);

            // Transférez les données groupées à la vue
            $this->monthlyPluviometrieData = $monthlyPluviometrie;
            $this->monthlyTemperatureData = $monthlyTemperature;
        } else {
            // Gérez le cas où la station n'est pas trouvée
        }
    }

    private function fillMissingMonths(&$data)
    {
        $minYear = min(array_keys($data));
        $maxYear = max(array_keys($data));

        $months = range(1, 12);

        foreach ($data as &$yearData) {
            $currentMonths = array_keys($yearData);
            $missingMonths = array_diff($months, $currentMonths);
            
            foreach ($missingMonths as $month) {
                $yearData[$month] = 0;
            }
            
            ksort($yearData);
        }
    }

    public function render()
    {
        // dd($this->monthlyPluviometrieData);
        return view('livewire.graphiques.index', [
            "station" => Station::where('id', $this->station->id)->get(),
            'monthlyPluviometrieData' => $this->monthlyPluviometrieData,
            'monthlyTemperatureData' => $this->monthlyTemperatureData,
        ])->extends("layouts.master")->section("contenu");
    }
}

