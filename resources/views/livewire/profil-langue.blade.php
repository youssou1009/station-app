<div>
    <!-- Formulaire d'envoi de notification -->
    <form wire:submit.prevent="sendNotification">
        <div class="form-group">
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
            <textarea wire:model.defer="message" class="form-control"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <!-- Liste des notifications -->
    <ul>
        @foreach($notifications as $notification)
            <li>{{ $notification->message }}</li>
        @endforeach
    </ul>
</div>