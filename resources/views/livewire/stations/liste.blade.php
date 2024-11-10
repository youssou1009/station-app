          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-home fa-2x"></i> Liste des stations</h3>
                
                   @if(auth()->user()->hasRole('chercheur'))
                    <a href="{{ route('chercheurs')}} " class="btn btn-link card-title text-white d-flex flex-grow-1 align-items-center mt-1">
                      Mes stations
                    </a>
                  @endif
                 
             

                <div class="card-tools d-flex align-items-center ">
                {{-- <a class="btn btn-link text-white mr-4 d-block" 
                wire:click.prevent="goToAddStation()"><i class="fas fa-home"></i> Ajouter une station</a> --}}
                  @if(auth()->user()->hasRole('admin'))
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddStation()">
                      <i class="fas fa-home fa-2x"></i><i class="fas fa-plus" style="margin-bottom: -1px;"></i>
                    </a>
                  @endif
                  <div class="input-group input-group-md" style="width: 350px;">
                    <input wire:model.debounce.300ms="search" type="text" name="table_search" class="form-control float-right" placeholder="Recherche">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >
                {{-- <div class="d-flex justify-content-end p-4 bg-indigo">
                 
                </div> --}}
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                            <th style="width:25%;">
                                Nom
                                
                            </th>
                            <th class="text-center" style="width:15%;">Region</th>
                            <th class="text-center" style="width:20%;">Departement</th>
                            <th class="text-center" style="width:15%;">Ajouté</th>
                            <th class="text-center" style="width:25%;">Action</th>
                        </tr>
                        </thead>
                    <tbody>

                            @forelse ($stations as $station)
                                <tr>
                                    
                                    <td>{{ $station->nom}}</td>
                                    <td class="text-center">{{ $station->departement->region->nom }}</td>
                                    <td class="text-center">{{ $station->departement->nom }}</td>
                                    <td class="text-center">{{ $station->created_at
                                    ->diffForHumans()}}</td>
                                    <td class="text-center">
                                        {{-- @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('chercheur')) --}}
                                          <a 
                                          title="Données: {{$station->nom}} "
                                          href="{{ route('stations.mesures', ['stationId'=> $station->id])}}"
                                          class="btn btn-link" style="color: info;"> <i class="fas fa-money-check"></i>
                                          </a>
                                        {{-- @endif --}}
                                        <a 
                                          title="Détails: {{$station->nom}} "
                                          href="{{ route('stations.details', ['stationId'=> $station->id])}}"
                                          class="btn btn-link" style="color: gray;"><i class="fas fa-eye"></i>
                                        </a>
                                        @if(auth()->user()->hasRole('admin'))
                                          <button class="btn btn-link" style="color: green;" wire:click="goToEditStation({{$station->id}})"> <i class="far fa-edit"></i> </button>
                                        @endif

                                        @if(auth()->user()->hasRole('admin'))
                                          <button class="btn btn-link" style="color: red;" wire:click="confirmDelete('{{ $station->nom }}', {{ $station->id }})"><i class="far fa-trash-alt"></i> </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger">

                                            <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                            Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                            </div>
                                    </td>
                                </tr>
                            @endforelse
                    </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $stations->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>

<script>
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
      @this.deleteStation(event.detail.message.data.station_id)
    }
    })

    window.addEventListener("showSuccesMessage", event =>{
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: event.detail.message || "Opération effectuée avec succès!",
        showConfirmButton: false,
        timer: 3000
      });
    })


  })
</script>