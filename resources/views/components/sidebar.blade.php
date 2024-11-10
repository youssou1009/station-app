{{-- sidebar --}}
<aside class="control-sidebar control-sidebar-dark">

<div class="bg-dark">
<div class="card-body bg-dark box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{asset('images/man.png')}}" alt="User profile picture">
</div>
<h3 class="profile-username text-center ellipsis">{{userFullName()}}</h3>
<p class="text-muted text-center text-white">{{getRolesName()}}</p>
<ul class="list-group bg-dark mb-3">
    <li class="list-group-item">
        <a href="{{route('change-password')}}" class="nav-link" 
        ><i class="fa fa-lock pr-2"></i><b> Mot de passe</b></a>
    </li>
    {{-- wire:click.prevent="changePassword" --}}
    <li class="list-group-item">
        <a href="{{route('profile-langue')}}" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon profil</b></a>
    </li>
</ul>

<a class="btn btn-primary btn-block" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        Deconnexion
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
</div>

</div>
</aside>
{{-- sidebar --}}