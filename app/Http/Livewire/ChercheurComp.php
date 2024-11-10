<?php

namespace App\Http\Livewire;

use App\Models\Chercheur;
use App\Models\Departement;
use App\Models\Station;
use Carbon\Carbon;
use Livewire\Component;

class ChercheurComp extends Component
{
    
    
    public function render()
    {
        Carbon::setLocale("fr");
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Vérifier si l'utilisateur est un chercheur
        if ($user->hasRole('chercheur')) {
            // Récupérer le département de l'utilisateur
            $departementId = $user->departement_id;

            // Récupérer les stations dans le département de l'utilisateur
            $stations = Station::whereHas('departement', function ($query) use ($departementId) {
                $query->where('id', $departementId);
            })->paginate(10);

            // Passer les stations à la vue
            return view('livewire.chercheur-comp', [
                'stations' => $stations
            ])
            ->extends("layouts.master")
            ->section("contenu");
        } else {
            // Redirection ou autre traitement si l'utilisateur n'est pas un chercheur
        }
    }
    // ssss
    // public function render()
    // {
    //     Carbon::setLocale("fr");
    //     // Récupérer toutes les departements avec leurs régions associées
    //     $stations = Station::with('departement.region')->latest()->paginate(5);
    //     return view('livewire.chercheur-comp', [
    //       "stations" => $stations,
    //     ])
    //     ->extends("layouts.master")
    //     ->section("contenu");
    // }
}
