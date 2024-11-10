<?php

namespace App\Http\Livewire;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\MesureStation;
use App\Models\Station;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class MesuresComp extends Component
{
    protected $dates = ['created_at'];
    use WithPagination, WithFileUploads;
    protected $paginationTheme = "bootstrap";
 
    public Station  $station;
    public $importFile;
    // public $isBtnAddClicked = false;
    public $currentPage = "PAGEMESURELIST";
    
    public $pluviometrie;
    public $temperature;

    public $editMesure = [];

    public function mount($stationId)
    {
        // Assurez-vous que $stationId contient une valeur valide
        // et qu'il peut être utilisé pour trouver une instance de Station
        $this->station = Station::findOrFail($stationId);
    }
    
    protected $messages = [
        'pluviometrie.required' => 'Le champ pluviométrie est requis.',
        'pluviometrie.numeric' => 'Le champ pluviométrie doit être un nombre.',
        'pluviometrie.gte' => 'La pluviométrie doit être supérieure ou égale à 0.',
        'pluviometrie.lte' => 'La valeur de la pluviométrie ne doit pas dépasser 200 par jour.',
        'temperature.required' => 'Le champ température est requis.',
        'temperature.numeric' => 'Le champ température doit être un nombre.',
        'temperature.between' => 'La température doit être comprise entre -10 et 100.',
    ];

    
    public function render()
    {
        // dd($this->mesure);
        Carbon::setLocale("fr");
        //   dd($this->station);     
        return view('livewire.mesures.index', [
            "mesures" => DB::table('mesure_stations')
                ->whereStationId($this->station->id)
                ->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITMESUREFORM){
        //     return  [
        //         'editMesure.pluviometrie' => "required",
        //         'editMesure.temperature' => "required"
        //     ];
        // }
        return  [
            // 'editMesure.pluviometrie' => "required|numeric|between:-10,100",
            'editMesure.pluviometrie' => "required|numeric|gte:0|lte:200",
            'editMesure.temperature' => "required|numeric|between:-10,100"
        ];
    } else {
        return [
            // 'pluviometrie' => "required|numeric|between:-10,100",
            'pluviometrie' => "required|numeric|gte:0|lte:200",
            'temperature' => "required|numeric|between:-10,100"
        ];
    }
    }
    
    public function goToAddMesure(){
        // $this->isBtnAddClicked = true;
        $this->currentPage = PAGECREATEMESUREFORM;
    }

    public function goToEditMesure($id){
        // $this->isBtnAddClicked = true;
        // $this->editMesure = DB::table('mesure_stations')->find($id);
        $this->editMesure = MesureStation::find($id)->toArray();
        $this->currentPage = PAGEEDITMESUREFORM;
    }

    public function goToListMesure(){
        // $this->isBtnAddClicked = false;
        $this->currentPage = PAGEMESURELIST;
    }

    public function addMesure(){
        $this->validate([ 
            'pluviometrie' => 'required|numeric|gte:0',
            'pluviometrie' => 'required|numeric|gte:0|lte:200',
            'temperature' => 'required|numeric',
            'temperature' => 'required|numeric|between:-10,100',

        ]);
        
    
        $user_id = Auth::id();
        $station_id = $this->station->id;
        DB::table('mesure_stations')->insert([
            'pluviometrie' => $this->pluviometrie,
            'temperature' => $this->temperature,
            'user_id' => $user_id,
            'station_id' => $station_id
        ]);

        
        // Réinitialiser les champs après l'ajout de la mesure
        $this->reset(['pluviometrie', 'temperature']);
        $this->dispatchBrowserEvent("SuccesMessage", ["message" => 
        "Les données sont enregistrer avec success  !"]);
       
    }

    
    public function updateMesure(){
        $validationAttributes = $this->validate();
        // dump($validationAttributes);
        MesureStation::find($this->editMesure['id'])->update($validationAttributes["editMesure"]);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
        "Données mis à jour avec success  !"]);
    }

    


   
    public function importMesures()
{
    $this->validate([
        'importFile' => 'required|mimes:csv,txt',
    ]);

    // Stocker le fichier temporairement
    $file = $this->importFile->store('temp');

    // Obtenir le chemin complet du fichier
    $path = Storage::path($file);

    // Lire le fichier CSV
    $data = array_map('str_getcsv', file($path));

    // Insérer les données dans la base de données
    foreach ($data as $row) {
        MesureStation::create([
            'pluviometrie' => $row[0], // Changer selon votre structure CSV
            'temperature' => $row[1], // Changer selon votre structure CSV
            'user_id' => Auth::id(),
            'station_id' => $this->station->id,
            'created_at' => Carbon::now(), // ou modifier selon vos besoins
        ]);
    }

    // Supprimer le fichier temporaire après l'importation
    Storage::delete($file);

    // Flash message pour indiquer que l'importation est réussie
    session()->flash('success', 'Données importées avec succès.');

    // Rediriger vers la route nommée 'stations.graphiques' avec le paramètre stationId
    return redirect()->route('stations.graphiques', ['stationId' => $this->station->id]);
}


public function deleteMesure($id)
{
    MesureStation::find($id)->delete();
    session()->flash('success', 'Donnée supprimée avec succès.');
}

    
 
}
