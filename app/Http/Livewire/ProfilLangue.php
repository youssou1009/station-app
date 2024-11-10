<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class ProfilLangue extends Component
{

    public $notifications;
    public $message;
    public $type_de_message; // Déclarez la propriété $type_de_message

    public function mount()
    {
        $this->notifications = Auth::user()->notifications()->latest()->get();
    }

    public function sendNotification()
    {
        // Valider que le champ type_de_message est rempli
        $this->validate([
            'type_de_message' => 'required',
        ]);
    
        // Enregistrer la notification dans la base de données
        Notification::create([
            'user_id' => Auth::id(),
            'message' => $this->message,
            'type_de_message' => $this->type_de_message,
        ]);
    
        // Effacer le champ de message après l'envoi de la notification
        $this->message = '';
    
        // Actualiser la liste des notifications après l'envoi
        $this->mount();
    }

    
   
    public function render()
    {
        return view('livewire.profil-langue')
        ->extends("layouts.master")
        ->section("contenu");
    }
}
