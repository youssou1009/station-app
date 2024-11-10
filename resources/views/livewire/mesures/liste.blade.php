<div>
      {!! session()->get('success') ? '<div class="alert alert-success">' . session()->get('success') . '</div>' : '' !!}
            <div class="col-12">
            <div class="card">
            <h4 class="text-center" 
              style="background-image: linear-gradient(to right, red, yellow); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
              Bienvenu à, {{ $station->nom }}
            </h4>
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <a href="{{route('stations')}}" class="btn btn-link text-white mr-auto mr-4 d-block" 
                ><i class="fas fa-long-arrow-alt-left fa-2x"></i></a>

                {{-- <a href="{{ route('stations.details', ['stationId'=> $station->id])}}" 
                class="card-header bg-gradient-primary d-flex align-items-center d-block" 
                ><i class="fas fa-info-circle"></i>Voir les détails</a> --}}

                <a href="{{ route('stations.graphiques', ['stationId'=> $station->id])}}" 
                class="card-header bg-gradient-primary d-flex align-items-center d-block" 
                ><i class="fas fa-chart-line fa-2x"></i>  Graphique</a>

                <div class="card-tools ml-auto d-flex align-items-center d-block">
                @if(auth()->user()->hasRole('chercheur') && $station->departement_id == auth()->user()->departement_id)
                  <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddMesure()">
                    <i class="fas fa-tint fa-2x"></i> Ajouter une donnée
                  </a>
                @endif
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" >
                <div style="height:350px;">
                    <table class="table table-head-fixed">
                      <thead>
                        <tr>
                            <th style="width:5%;"></th>
                            <th class="text-center" style="width:30%;">Pluviométrie(mm)</th>
                            <th class="text-center" style="width:30%;">Température(°C)</th>
                            <th class="text-center" style="width:15%;">Date d'ajout</th>
                            <th class="text-center" style="width:20%;">Action</th>
                        </tr>
                        </thead>
                    <tbody>
                        @forelse ($mesures as $mesure)
                            <tr>
                                <td>{{++$loop->index}}</td>
                                <td class="text-center">{{$mesure->pluviometrie}} mm</td>
                                <td class="text-center">{{$mesure->temperature}} °C</td>
                                
                                    <td class="text-center">
                                    <span class="tag tag-success">{{$mesure->created_at}}</span></td>
                                    {{-- {{ \Carbon\Carbon::parse($mesure->created_at)->format('d/m/Y H:i:s') }} --}}
                               
                                <td class="text-center">
                                  @if(auth()->user()->hasRole('chercheur'))
                                  <button wire:click="goToEditMesure({{$mesure->id}})" class="btn btn-link"><i class="far fa-edit"></i></button>
                                  <button
                                  wire:click="deleteMesure({{$mesure->id}})" onclick="confirm('Êtes-vous sûr de vouloir supprimer cette mesure ?') || 
                                  event.stopImmediatePropagation()"
                                   class="btn btn-link"><i class="far fa-trash-alt"></i> </button>
                                  @endif
                                </td>
                            </tr>
                        @empty
                          <tr style="background-image: linear-gradient(to right, #ff7e5f, #feb47b);"> <!-- Dégradé de couleur pour le fond de la ligne -->
                            <td colspan="6">
                                <div style="background-image: linear-gradient(to right, #ff7e5f, #feb47b);">
                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Cette station ne contient pas encore de données !!!.
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
                    {{ $mesures->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
</div>
</div>