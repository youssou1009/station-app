<?php

namespace App\Http\Livewire;

use App\Models\Chercheur;
use App\Models\Departement;
use App\Models\Permission;
use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateur extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search = '';

    public $regions;
    public $departements;
    public $departementId;
    public $regionId;
    // public $isBtnAddClicked = false;
    public $currentPage = "PAGELIST";
    public $newUser = [];
    public $editUser = [];

    public $rolePermissions = [];
   

    protected $messages = [
        'newUser.nom.required' => 'le nom est requis',
        'newUser.prenom.required' => 'le prenom est requis',
        'newUser.sexe.required' => 'le sexe est requis',
        'newUser.telephone1.required' => 'le numéro de téléphone 1 est requis',
        'newUser.email.required' => "l'adresse email est requis",
        'editUser.email.required' => "l'adresse email est requis"
    ];

    


    public function mount()
    {
        $this->regions = Region::all(); // Récupérez toutes les régions depuis la base de données
        $this->departements = Departement::all();
    }
    

    public function updateDepartements()
    {
    $this->departements = Departement::where('region_id', $this->regionId)->get();
    }
    // public function updateDepartements()
    // {
    //     $this->departements = Departement::where('region_id', $this->editUser['region_id'])->get();
    // }


    public function render()
    {
        Carbon::setLocale("fr");

        $users = User::query()
        ->where('nom', 'like', '%' . $this->search . '%')
        ->orWhere('prenom', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate(5);

        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5),
            "users" => $users
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.sexe' => 'required',
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")
                ->ignore($this->editUser['id']) ],
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")
                ->ignore($this->editUser['id']) ] ,
            ];
        }
        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.sexe' => 'required',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.email' => 'required|email|unique:users,email',
        ];
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }

    // public function goToEditUser($id){
    //     $this->editUser = User::find($id)->toArray();
    //     $this->currentPage = PAGEEDITFORM;

    //     $this->populateRolePermissions();
    // }
    public function goToEditUser($id)
{
    $user = User::find($id);

    // Initialisation de editUser avec les données de l'utilisateur
    $this->editUser = [
        'id' => $user->id,
        'nom' => $user->nom,
        'prenom' => $user->prenom,
        'sexe' => $user->sexe,
        'telephone1' => $user->telephone1,
        'telephone2' => $user->telephone2,
        'email' => $user->email,
        'region_id' => $user->region_id, // Assurez-vous que region_id est correctement défini ici
        'departement_id' => $user->departement_id, // Assurez-vous que departement_id est correctement défini ici
        // Ajoutez d'autres champs d'édition nécessaires ici
    ];

    $this->populateRolePermissions(); // Chargez les rôles et permissions pour l'utilisateur
    $this->currentPage = PAGEEDITFORM;
}


    public function populateRolePermissions(){
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function($value){
            return $value["id"];
        };

        $rolesIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray());
        $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray());
        //dump($roles);
        foreach(Role::all() as $role){
            if(in_array($role->id, $rolesIds)){
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
            }
        }
        
        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
            }
        }
        // dump($this->rolePermissions);
    }

    public function updateRoleAndPermissions(){
        DB::table("role_users")->where("user_id", $this->editUser["id"])->delete();
        DB::table("permission_users")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Roles et permissions mis à jour avec succès!"]);
    }

    public function goToListUser(){
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }

    // public function addUser(){
    //     $validationAttributes = $this->validate();
        
    //     // $validationAttributes["newUser"]["password"] = "password";
    //     // $validationAttributes["newUser"]["photo"] = "photo";
    //     $validationAttributes["newUser"]["departement_id"] = "departement_id";
        
    //     $validationAttributes["newUser"]["password"] = Hash::make("password");
    //     $validationAttributes["newUser"]["photo"] = "photo";
    //     // $validationAttributes["newUser"]["departement_id"] = $this->departementId; // attribuer le département sélectionné
    //     // dump($validationAttributes);
    //     User::create($validationAttributes["newUser"]);

    //     $this->newUser = [];
    //     $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
    //     "Utilisateur crée avec success  !"]);
    // }

    public function addUser(){
        $validationAttributes = $this->validate([
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.sexe' => 'required',
            'newUser.telephone1' => 'required|numeric',
            'newUser.email' => 'required|email|unique:users,email',
            'departementId' => 'required|exists:departements,id', // Assure la validité de l'id du département
            ], [
            'newUser.email.unique' => 'Cette adresse email est déjà prise.',
            'newUser.nom.required' => 'Le nom est requis.', // Message d'erreur personnalisé
            'newUser.prenom.required' => 'Le prenom est requis.',
            'newUser.sexe.required' => 'Le sexe est requis.',
            'newUser.telephone1.required' => 'Le telephone1 est requis.',
            'newUser.email.required' => "L'email est requis.",
            'departementId.required' => 'Le champ département est requis.', 
        ]);
    
        $validationAttributes["newUser"]["password"] = Hash::make("password");
        $validationAttributes["newUser"]["photo"] = "photo";
        $validationAttributes["newUser"]["departement_id"] = $this->departementId; // Utilisation du département sélectionné
    
        User::create($validationAttributes["newUser"]);
    
        $this->newUser = [];
        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Utilisateur créé avec succès!"]);
    }

     public function updateUser(){
         $validationAttributes = $this->validate();
      
         User::find($this->editUser['id'])->update($validationAttributes["editUser"]);

    //     // Mettre à jour le département associé au chercheur
    //     // $chercheur = Chercheur::where('user_id', $this->editUser['id'])->first();
    //     // if ($chercheur) {
    //     //     $chercheur->departement_id = $this->departementId;
    //     //     $chercheur->save();
    //     // }

        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
        "Utilisateur mis à jour avec success  !"]);
    }

//     public function updateUser()
// {
//     $this->validate([
//         'editUser.nom' => 'required',
//         'editUser.prenom' => 'required',
//         'editUser.sexe' => 'required',
//         'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")
//             ->ignore($this->editUser['id'])],
//         'editUser.email' => ['required', 'email', Rule::unique("users", "email")
//             ->ignore($this->editUser['id'])],
//         'editUser.region_id' => 'required|exists:regions,id',
//         'editUser.departement_id' => 'required|exists:departements,id',
//     ]);

//     // Mettre à jour l'utilisateur
//     User::find($this->editUser['id'])->update([
//         'nom' => $this->editUser['nom'],
//         'prenom' => $this->editUser['prenom'],
//         'sexe' => $this->editUser['sexe'],
//         'telephone1' => $this->editUser['telephone1'],
//         'telephone2' => $this->editUser['telephone2'],
//         'email' => $this->editUser['email'],
//         'region_id' => $this->editUser['region_id'],
//         'departement_id' => $this->editUser['departement_id'],
//     ]);

//     $this->dispatchBrowserEvent("showSuccesMessage", ["message" => "Utilisateur mis à jour avec succès !"]);
// }

    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. 
            Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning"
        ]]);
    }

    public function resetPassword(){

        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSOWRD)]);
        $this->dispatchBrowserEvent("showSuccesMessage", ["message"=>"Mot de passe utilisateur 
        réinitialisé avec succès!"]);
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" =>[
            "text" => "vous etes sur 
            le point de supprimer '$name' de la liste des utilisateurs. Voulez-vous continuez?",
            "title" => "Etes-vous sur de continuez?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id){
        // Supprimer d'abord les enregistrements liés dans role_users
        DB::table('role_users')->where('user_id', $id)->delete();
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccesMessage", ["message" => 
        "Utilisateur supprimé avec success!"]);
    }






}
