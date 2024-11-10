    <div class="row p-4">
        <div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i>Formulaire de création d'un nouvel utilisateur</h3>
</div>


<form role="form" wire:submit.prevent="updateUser()" method="POST">
<div class="card-body">
<div class="form-group">

<div class="d-flex">   
    <div class="form-group flex-grow-1 mr-2">
        <label>Nom</label>
        <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom')
        is-invalid @enderror">
        @error("editUser.nom")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
        
    <div class="form-group flex-grow-1">
        <label>Prenom</label>
        <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom')
        is-invalid @enderror">
        @error("editUser.prenom")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>





<div class="form-group">
<label>Sexe</label>
<select class="form-control @error('editUser.sexe') is-invalid @enderror" wire:model="editUser.sexe">
    <option value="">-----------------------SEXE----------------------</option>
    <option value="H">Homme</option>
    <option value="F">Femme</option>
</select>
    @error("editUser.sexe")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="d-flex">   
    <div class="form-group flex-grow-1 mr-2">
        <label>Telephone 1</label>
        <input type="text" class="form-control 
        @error('editUser.sexe') is-invalid @enderror"  wire:model="editUser.telephone1">
        @error("editUser.telephone1")
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
        
    <div class="form-group  flex-grow-1">
        <label>Telephone 2</label>
        <input type="text" class="form-control" wire:model="editUser.telephone2">
    </div>
</div>

<div class="form-group">
<label>Adresse e-mail</label>
<input type="email" class="form-control 
@error('editUser.email') is-invalid @enderror" wire:model="editUser.email">
    @error("editUser.email")
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

{{-- edit departement --}}
{{-- <div class="d-flex">
    <div class="form-group flex-grow-1">
        <label>Région</label>
        <select wire:model='editUser.region_id' class="form-control @error('editUser.region_id') is-invalid @enderror" wire:change="updateDepartements">
            <option value="">Sélectionnez une région</option>
            @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->nom }}</option>
            @endforeach
        </select>
        @error('editUser.region_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group flex-grow-1">
        <label>Département</label>
        <select wire:model='editUser.departement_id' class="form-control @error('editUser.departement_id') is-invalid @enderror">
            <option value="">Sélectionnez un département</option>
            @foreach($departements as $departement)
                <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
            @endforeach
        </select>
        @error('editUser.departement_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div> --}}
{{-- edit departement --}}
<div class="card-footer">
<button type="submit" class="btn btn-primary">Modifier</button>
<button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
</div>
</form>
</div>
</div>

</div>
{{-- roleetpermissions --}}
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-key fa-2x"
                        ></i>Réinitialisation de mot de passe</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="#" class="btn btn-link" wire:click.prevent="confirmPwdReset()">
                                Réinitialiser le mot de passe</a>
                                <span>(par défaut: "password") </span>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
            <div class="col-md-12">
                            <div class="card card-primary">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i>Roles</h3>
                        <button class="btn bg-gradient-success mr-2" wire:click="updateRoleAndPermissions">
                        <i class="fas fa-check"></i> Appliquer</button>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            @foreach($rolePermissions["roles"] as $role)
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="card-title flex-grow-1">
                                        <a  data-parent="#accordion" href="#"  aria-expanded="true">
                                            {{$role["role_nom"]}}
                                        </a>
                                    </h4>
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input"
                                        wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                                        @if($role["active"]) checked @endif
                                        id="customSwitch{{$role['role_id']}}">
                                        <label class="custom-control-label" for="customSwitch{{$role['role_id']}}">
                                        {{ $role["active"]? "Activé" : "Desactivé" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> 
                    {{-- yyyyyyyyyyyyyy --}}
{{--                     
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

                        <div class="col-6">
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
                    </div> --}}
                    {{-- yyyyyyyyyyyyyy --}}
                </div>
            </div>
        </div>
    </div>
{{-- roleetpermission --}}

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


    window.addEventListener("showConfirmMessage", event =>{
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuer",
            cancelButtonText: "Annuler"
        }).then((result) => {
        if (result.isConfirmed) {
            @this.resetPassword()
        }
        });
    });
</script>
