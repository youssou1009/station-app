<div>
    @if ($successMessage)
        <div class="alert alert-success">{{ $successMessage }}</div>
         <button class="btn btn-primary" 
         wire:click="returnToHome">Retour à la page d'accueil</button>
    @endif
</div>

<form wire:submit.prevent="changePassword" wire:loading.class="opacity-50">
    <div class="form-group">
        <label for="currentPassword">Mot de passe actuel</label>
        <input type="password" class="form-control" id="currentPassword" wire:model="currentPassword">
        @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="newPassword">Nouveau mot de passe</label>
        <input type="password" class="form-control" id="newPassword" wire:model="newPassword">
        @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="confirmPassword">Confirmer le nouveau mot de passe</label>
        <input type="password" class="form-control" id="confirmPassword" wire:model="confirmPassword">
        @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        {{-- <button class="btn btn-info" wire:click.prevent="cancel">Annuler</button> --}}
    </div>
    
</form>