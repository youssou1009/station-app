<div class="row p-4 pt-5">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-home fa-2x"></i> Formulaire d'ajout de mesures</h3>
        </div>

        <form role="form" wire:submit.prevent='updateMesure()'>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Pluviométrie:</label>
                            <input type="double" wire:model="editMesure.pluviometrie" class="form-control @error('editMesure.pluviometrie') is-invalid @enderror">
                            @error('editMesure.pluviometrie')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label>Température:</label>
                            <input type="number" wire:model="editMesure.temperature" class="form-control @error('editMesure.temperature') is-invalid @enderror">
                            @error('editMesure.temperature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                 <!-- Champ caché pour station_id -->
                <input type="hidden" wire:model="station_id">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Modifier données</button>
                <button type="button" wire:click.prevent="goToListMesure()" class="btn btn-danger">Retourner</button>
            </div>
        </form>
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