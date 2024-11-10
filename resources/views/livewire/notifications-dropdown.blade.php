{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications</title>
    <style>
        /* Définir une classe pour le conteneur autour du textarea */
        .container {
            margin-top: 20px; /* Ajouter une marge en haut */
        }
    </style>

    <link rel="stylesheet" href="{{mix("css/app.css")}}"/>
    @livewireStyles
</head>
<body>
     <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-4*1 text-center mt-3">NOTIFICATIONS</h1>
                <form class="bg-white" wire:submit.prevent="sendNotification">
                    <h6 class="text-center">publier une notification</h6>
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center"> <!-- Utilisation de justify-content-center pour centrer le contenu -->
                            <textarea id="message" name="message" rows="4" cols="30" class="form-control" placeholder="Ecrivez votre message..."></textarea><br>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="mt-4 mb-2 text-center"
                            style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" value="Envoyer">
                        </div>
                    </div>
                </form>    
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <ul>
                    @foreach($notifications as $notification)
                        <li>{{ $notification->message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

 
<script src="{{mix("js/app.js")}}"></script>
@livewireScripts
</body>
</html> --}}


<div class="row justify-content-left">
    <div class="col-md-4">
        <!-- Formulaire d'envoi de notification -->
        <div class="col">
            <h5 class="text-4*1 text-center mt-3">NOTIFICATION</h5>
        </div>
        <form class="bg-white" wire:submit.prevent="sendNotification">
            <h6 class="text-center">Publier une notification</h6>
            
            <div class="text-center">
                @if($showSuccessMessage)
                    <div class="alert alert-success">{{ $successMessage }}</div>
                @endif
            </div>

            @push('scripts')
                <script>
                    document.addEventListener('livewire:load', function () {
                        Livewire.on('hideSuccessMessage', () => {
                            setTimeout(() => {
                                @this.set('showSuccessMessage', false);
                            }, @this.get('timeout'));
                        });
                    });
                </script>
            @endpush

            <div class="form-group mt-5">
                <label>Type de message</label>
                <select wire:model.defer="type_de_message" class="form-control" required>
                    <option value="">Sélectionnez le type de message</option>
                    <option value="info">Information</option>
                    <option value="warning">Avertissement</option>
                    <option value="error">Erreur</option>
                </select>
                @error('type_de_message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea wire:model.defer="message" class="form-control" rows="4" maxlength="500"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="text-center">
                <input type="submit" class="mt-4 mb-2 text-center"
                       style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"
                       value="Envoyer">
            </div>
        </form>
    </div>
    <div class="col-md-8 mt-5">
        {{-- <!-- Liste des notifications -->
        <ul>
            @foreach($notifications as $notification)
                <li>{{ $notification->message }}</li>
            @endforeach
        </ul> --}}
        <!-- Liste des notifications -->
        <div class="card">
            <div class="card-header bg-primary" style="text-align: center;">
                <h5 class="card-title" style="margin: 0; padding: 0;">Notifications</h5>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($notifications as $notification)
                     <li class="list-group-item d-flex justify-content-between align-items-center"
                        @if($notification->created_at->isToday()) 
                            style="background-color: rgba(0, 0, 255, 0.3); color: dark;" 
                        @endif>
                        <div>
                            @if(strlen($notification->message) > 50) {{-- Limiter la longueur du message à 50 caractères --}}
                                {{ substr($notification->message, 0, 50) . '...' }}
                                <button class="btn btn-link" data-toggle="collapse" data-target="#message{{ $notification->id }}">Lire la suite</button>
                                <div id="message{{ $notification->id }}" class="collapse">{{ $notification->message }}</div>
                            @else
                                {{ $notification->message }}
                            @endif
                        </div>
                        {{-- <div>{{ $notification->message }}</div> --}}
                        <div class="text-right">
                            @if($notification->type_de_message === 'info')
                                Information
                            @elseif($notification->type_de_message === 'warning')
                                Avertissement
                            @elseif($notification->type_de_message === 'error')
                                Erreur
                            @else
                                {{ $notification->type_de_message }}
                            @endif
                        </div>
                        <div>
                            <button wire:click="deleteNotification({{ $notification->id }})" class="btn btn-sm btn-danger">Supprimer</button>
                        </div>
                    </li>
                    {{-- <li class="list-group-item">{{ $notification->message }}-{{ $notification->type_de_message }}</li> --}}
                @endforeach
            </ul>
        </div>
    </div>
</div>