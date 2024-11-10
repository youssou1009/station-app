<div class="row p-4 pt-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title text-center"><i class="fas fa-tint  fa-2x"></i> Formulaire d'ajout de mesures <i class="fas fa-temperature-low fa-2x"></i></h3>
        </div>

        <form role="form" wire:submit.prevent='addMesure()'>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Pluviométrie:</label>
                            <input type="double" wire:model="pluviometrie" class="form-control @error('pluviometrie') is-invalid @enderror">
                            @error('pluviometrie')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Température:</label>
                            <input type="double" wire:model="temperature" class="form-control @error('temperature') is-invalid @enderror">
                            @error('temperature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                 <!-- Champ caché pour station_id -->
                <input type="hidden" wire:model="station_id">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="button" wire:click.prevent="goToListMesure()" class="btn btn-danger">Retourner à la liste des données</button>
            </div>
        </form>
    </div>
    

 
</div>

  

    


</div>