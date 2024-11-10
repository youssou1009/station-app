<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Livewire\Component;

class NotificationsDropdown extends Component
{
    
    public $successMessage = '';
    public $showSuccessMessage = false;

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

        $this->successMessage = 'Message envoyé avec succès!';
        $this->showSuccessMessage = true;

        // Définir un délai pour masquer le message de succès après 5 secondes
        $this->dispatchBrowserEvent('hideSuccessMessage', ['timeout' => 5000]);
    }
    

    public function render()
    {
        $notifications = Notification::all();
        return view('livewire.notifications-dropdown', ['notifications' => $notifications])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function deleteNotification($notificationId)
    {
        $notification = Notification::findOrFail($notificationId);
        $notification->delete();
        $this->mount(); // Recharger la liste des notifications
        $this->showSuccessMessage = true;
        $this->successMessage = 'Notification supprimée avec succès!';
        $this->dispatchBrowserEvent('hideSuccessMessage', ['timeout' => 5000]);
    }
}
