<div class="row p-4 pt-5">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title"><i class="fas fa-home fa-2x"></i>Formulaire de création d'une station</h3>
</div>

 {{-- role="form" wire:submit.prevent='addStation()' --}}
<form role="form" wire:submit.prevent='addStation()'>
<div class="card-body">
<div class="form-group">
<label>Nom</label>
<input type="text" wire:model='newStation.nom' class="form-control @error('newStation.nom')
    is-invalid
@enderror">
@error('newStation.nom')
    <span class="text-danger">{{ $message }}</span>
@enderror
</div>

<div class="row">

  <div class="col-6">
  
    <div class="form-group">
        <label>Région</label>
        <select wire:model='regionId' class="form-control @error('regionId') is-invalid @enderror" 
            wire:change="updateDepartements">
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

</div>



<div class="row">

  <div class="col-4">
    <div class="form-group">
    <label>Latitude</label>
    <input type="number" wire:model='newStation.latitude' class="form-control @error('newStation.latitude')
        is-invalid
    @enderror">
    @error('newStation.latitude')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
    <label>Longitude</label>
    <input type="number" wire:model='newStation.longitude' class="form-control @error('newStation.longitude')
        is-invalid
    @enderror">
    @error('newStation.longitude')
        <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>

  <div class="col-4">
    <div class="form-group">
    <label>Altitude</label>
    <input type="number" wire:model='newStation.altitude' class="form-control @error('newStation.altitude')
        is-invalid
    @enderror">
    @error('newStation.altitude')
        <span class="text-danger">{{ $message }}</span>
    @enderror
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





    {{-- <div class="" >    
        <div class="form-group">
            <input type="file" wire:model="addPhoto">
        </div>
        <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
            
        </div>
    </div> --}}
    




<div class="card-footer">
<button type="submit" class="btn btn-primary">Enregistrer</button>
<button type="button" wire:click.prevent="goToListStation()" class="btn btn-danger">Retourner à la liste des stations</button>
</div>
</form>
</div>
</div>
{{-- image --}}
<div class="col-md-3">
    <div class="form-group">
        <label>Image de la station</label>
        <input type="file" wire:model="photo" class="form-control-file">
    </div>
    <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
        @if($photo)
            <img src="{{ $photo->temporaryUrl() }}" alt="Image de la station">
        @endif
    </div>
</div>
{{-- image --}}
</div>