<?php

namespace App\Http\Livewire;

use App\Models\Chercheur;
use App\Models\Departement;
use App\Models\Region;
use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class StationComp extends Component
{
    use WithPagination, WithFileUploads;
    
    protected $paginationTheme = "bootstrap";

    public $currentPage = "PAGELISTSTATION";

    public $selectedDepartment;
    public $stationdept;

    public $photo;

    public $newStation = [];
    public $departementId;
    public $regionId;

    public $editStation = [];

    public $regions;
    public $departements;

    public function mount()
    {
        $this->regions = Region::all();
        $this->departements = collect();
    }

    public function updateDepartements()
    {
    $this->departements = Departement::where('region_id', $this->regionId)->get();
    }
   
    public function render()
    {
        Carbon::setLocale("fr");

        // Récupérer toutes les departements avec leurs régions associées
        $stations = Station::with('departement.region')->latest()->paginate(5);
        
        // Récupérer la liste des départements à afficher dans le formulaire
        $departements = Departement::all();

        $regions = Region::all();

        return view('livewire.stations.index', [
            "departements" => $departements,
            "regions" => $regions,
            "stations" => $stations,
            
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function messages(){
        if($this->currentPage == PAGEEDITFORMSTATION){
            return [
                'editStation.nom.unique' => 'Le nom de la station est déjà utilisé.',
                'departementId.required' => 'Veuillez sélectionner un département.',
                'departementId.exists' => 'Le département sélectionné est invalide.',
                'regionId.required' => 'Veuillez sélectionner un region.',
                'regionId.exists' => 'Le region sélectionné est invalide.',
                'editStation.latitude.required' => 'La latitude est requise.',
                'editStation.longitude.required' => 'La longitude est requise.',
                'editStation.altitude.required' => "L'altitude est requise.",
                'editStation.altitude.gte' => 'azerty', // Ajout de la règle gte:0
                // 'editStation.altitude.required.gte' => 'La pluviométrie doit être supérieure ou égale à 0.'
            ];
        }
        return [
            'departementId.required' => 'Le champ département est requis.',
            'regionId.required' => 'Le champ région est requis.',
            'newStation.nom.required' => 'le nom de la station est requis',
            'newStation.region.required' => 'la region ou se trouve la station est requis',
            'newStation.departement.required' => 'le departement ou se trouve la station est requis',
            'newStation.latitude.required' => 'la latitude est requis',

            'newStation.latitude' => 'required|numeric|min:0', 
            'newStation.latitude.numeric' => 'La latitude doit être un nombre.',
            'newStation.latitude.min' => 'La latitude doit être positive ou nulle.',
            
            'newStation.longitude.required' => 'la longitude est requis',
            'newStation.altitude.required' => "l'altitude est requis",
            'newStation.altitude.numeric' => "L'altitude doit être un nombre.",
            'newStation.altitude.min' => "L'altitude doit être positive ou nulle.",
        ];
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORMSTATION){
            return [
                'editStation.nom' => ['required', Rule::unique("stations", "nom")
                ->ignore($this->editStation['id']) ] ,
                'departementId' => 'required|exists:departements,id',
                'regionId' => 'required|exists:regions,id',
                'editStation.latitude' => 'required',
                'editStation.longitude' => 'required',
                'editStation.altitude' => 'required',
            ];
        }
        return [
            'newStation.nom' => 'required|unique:stations,nom',
            'departementId' => 'required|exists:departements,id',
            'regionId' => 'required|exists:regions,id',
            'newStation.latitude' => 'required',
            'newStation.latitude' => 'required|numeric|min:0',
            'newStation.longitude' => 'required',
            'newStation.altitude' => 'required',
            'newStation.altitude' => 'required|numeric|min:0',
        ];
    }

    public function updatedSelectedDepartment($value)
    {
        $this->stationdept = Station::where('departement_id', $value)->get();
    }


    public function goToAddStation(){
        // $this->isBtnAddClicked = true;
        $this->currentPage = PAGECREATEFORMSTATION;
    }

    public function goToEditStation($id){
        $this->editStation = Station::find($id)->toArray();
        $this->currentPage = PAGEEDITFORMSTATION;
    }

    public function goToListStation(){
        // $this->isBtnAddClicked = false;
        $this->currentPage = PAGELISTSTATION;
        $this->editStation = [];
    }

    public function addStation(){
        $validationAttributes = $this->validate();
        
        $validationAttributes["newStation"]["departement_id"] = "departement_id";
        
        // Création de la station avec les données validées
        Station::create([
            'nom' => $validationAttributes['newStation']['nom'],
            'latitude' => $validationAttributes['newStation']['latitude'],
            'longitude' => $validationAttributes['newStation']['longitude'],
            'altitude' => $validationAttributes['newStation']['altitude'],
            'departement_id' => $this->departementId,
        ]);

         
        if ($this->photo) {
            // Stockez la photo dans le dossier 'photos' du répertoire 'public'
            $photoPath = $this->photo->store('photos', 'public');
            
            // Récupérez à nouveau l'objet Station en recherchant par nom
            $station = Station::where('nom', $validationAttributes['newStation']['nom'])->first();
            
            // Mettez à jour l'objet Station avec le chemin de la photo
            $station->update(['photo' => $photoPath]);
        }


        // Réinitialiser les champs du formulaire après l'ajout de la station
        $this->reset(['newStation', 'departementId']);
        // affichage du message de succes
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
        "La station est créée avec success  !"]);
    }

    public function updateStation(){
        $validationAttributes = $this->validate();
       
        // Récupérer la station actuellement éditée
    $station = Station::find($this->editStation["id"]);

    // Mettre à jour les champs de la station avec les nouvelles valeurs
    $station->nom = $validationAttributes['editStation']['nom'];
    $station->latitude = $validationAttributes['editStation']['latitude'];
    $station->longitude = $validationAttributes['editStation']['longitude'];
    $station->altitude = $validationAttributes['editStation']['altitude'];
    $station->departement_id = $this->departementId; // Mettre à jour le département
    $station->save();
        // Station::find($this->editStation["id"])->update($validationAttributes["editStation"]);
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
        "La station est mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous-etes sur le point
            de supprimer '$name' de la liste des stations. Voulez-vous continuez?",
            "title" => "Etes vous sur de continuer?",
            "type" => "warning",
            "data" => [
                "station_id" => $id
            ]
        ]]);
    }

    public function deleteStation($id){
        Station::destroy($id);
  
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
          "La station est supprimée avec succès!"]);
    }

    
}
