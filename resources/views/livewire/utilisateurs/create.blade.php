    <div class="row p-4">
        <div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire de création d'un nouvel utilisateur</h3>
</div>


<form role="form" wire:submit.prevent="addUser()">
<div class="card-body">
<div class="form-group">

<div class="d-flex">   
    <div class="form-group flex-grow-1 mr-2">
        <label>Nom</label>
        <input type="text" wire:model="newUser.nom" class="form-control @error('newUser.nom')
        is-invalid @enderror">
        @error("newUser.nom")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
        
    <div class="form-group flex-grow-1">
        <label>Prenom</label>
        <input type="text" wire:model="newUser.prenom" class="form-control @error('newUser.prenom')
        is-invalid @enderror">
        @error("newUser.prenom")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>





<div class="form-group">
<label>Sexe</label>
<select class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model="newUser.sexe">
    <option value="">-----------------------SEXE----------------------</option>
    <option value="H">Homme</option>
    <option value="F">Femme</option>
</select>
    @error("newUser.sexe")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="d-flex">   
    <div class="form-group flex-grow-1 mr-2">
        <label>Telephone 1</label>
        <input type="text" class="form-control 
        @error('newUser.sexe') is-invalid @enderror"  wire:model="newUser.telephone1">
        @error("newUser.telephone1")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
        
    <div class="form-group  flex-grow-1">
        <label>Telephone 2</label>
        <input type="text" class="form-control" wire:model="newUser.telephone2">
    </div>
</div>

<div class="form-group">
<label>Adresse e-mail</label>
<input type="email" class="form-control 
@error('newUser.email') is-invalid @enderror" wire:model="newUser.email">
    @error("newUser.email")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
{{-- youssou --}}
    {{-- <div class="form-group">
        <label>Département</label>
        <select class="form-control @error('departementId') is-invalid @enderror" wire:model="departementId">
            <option value="">Sélectionner un département</option>
            @foreach($departements as $departement)
                <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
            @endforeach
        </select>
        @error('departementId')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}

    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Région</label>
                                <select wire:model='regionId' class="form-control @error('regionId') is-invalid @enderror" 
                                wire:change="updateDepartements" >
                                    <option value="">Sélectionnez une région</option>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->nom }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Département</label>
                                <select wire:model='departementId' class="form-control @error('departementId') is-invalid @enderror">
                                    <option value="">Sélectionnez un département</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                    @endforeach
                                </select>
                                @error('departementId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
{{-- youssou --}}
{{-- <div class="form-group">
<label for="exampleInputPassword1">Mot de passe</label>
<input type="text" class="form-control" disabled placeholder="Password">
</div> --}}

<div class="card-footer">
<button type="submit" class="btn btn-primary">Enregistrer</button>
<button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
</div>
</form>
</div>
</div>

</div>

<script>
    window.addEventListener("showSuccesMessage", event => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            toast: 'true',
            title: event.detail.message || "Opération éffectué avec succes !",
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>
