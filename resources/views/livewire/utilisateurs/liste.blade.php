<div class="row p-4 pt-5">
<div class="col-12">
<div class="card">
<div class="card-header bg-gradient-primary d-flex align-items-center">
<h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Gestion utilisateurs</h3>
<div class="card-tools d-flex align-items-center">

<a class="btn btn-link text-white mr-4 d-block" 
wire:click.prevent="goToAddUser()"><i class="fas fa-user-plus fa-2x"></i></a>

<div class="input-group input-group-md" style="width: 250px;">
<input wire:model.debounce.300ms="search" type="text" name="table_search" class="form-control float-right" placeholder="Recherche">
<div class="input-group-append">
<button type="submit" class="btn btn-default">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</div>
</div>

<div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
<table class="table table-head-fixed text-nowrap">
<thead>
<tr>
<th style="width:5%;"></th>
<th style="width:15%;">Prenom</th>
<th style="width:15%;">Nom</th>
<th style="width:20%;" class="text-center">Role</th>
<th style="width:20%;" class="text-center">Ajouté</th>
<th style="width:25%;" class="text-center">Action</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td>
    @if ($user->sexe == "F")
        <img src="{{asset('images/fille.png')}}" width="40" />
        {{-- <p>Femme</p> --}}
    @else
        <img src="{{asset('images/homme.png')}}" width="40" />
        {{-- <p>Homme</p> --}}
    @endif
</td>
<td>{{$user->prenom}}</td>
<td>{{$user->nom}}</td>
<td class="text-center">
    @foreach ($user->roles as $role)
            {{ $role->nom }} |
    @endforeach
</td>
<td class="text-center"><span class="tag tag-success">{{$user->created_at
->diffForHumans()}}</span></td>
<td class="text-center">
    <button class="btn btn-link" style="color: green;" wire:click="goToEditUser({{$user->id}})"><i class="far fa-edit"></i></button>
    <button class="btn btn-link" style="color: red;" wire:click="confirmDelete('{{$user->prenom}} {{$user->nom}}', 
    {{$user->id}})"><i class="far fa-trash-alt"></i></button>
</td>
</tr>

@endforeach
</tbody>
</table>
</div>

<div class="card-footer">
        <div class="float-right">
            {{ $users->links() }}
        </div>
</div>
</div>

</div>
</div>

<script>
    window.addEventListener("showConfirmMessage", event => {
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Continuez",
            cancelButtonText: "Annulez"
            }).then((result) => {
            if (result.isConfirmed) {
                @this.deleteUser(event.detail.message.data.user_id)
            }
        })


        
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

    })
</script>