<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ChangePassword extends Component
{

    public $currentPassword;
    public $newPassword;
    public $confirmPassword;
    public $successMessage;


    public function render()
    {
        return view('livewire.change-password')
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function changePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|different:currentPassword',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        if (Hash::check($this->currentPassword, Auth::user()->password)) {
            Auth::user()->update(['password' => Hash::make($this->newPassword)]);
            $this->successMessage = 'Mot de passe modifié avec succès.';
        } else {
            $this->addError('currentPassword', 'Le mot de passe actuel est incorrect.');
        }
    }

    public function returnToHome()
    {
        return redirect()->to(route('home'));
    }

    public function cancel()
    {
        return redirect()->route('/');
    }

    
}
