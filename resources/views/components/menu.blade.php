

<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link {{SetMenuActive('home')}}">
        <i class="nav-icon fas fa-home"></i>
          <p>
            Accueil
          </p>
        </a>
    </li>

        
    {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Tableau de bord
            <i class="right fas fa-angle-left"></i>
          </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-chart-line"></i>
              <p>Vue globale</p>
          </a>
        </li>
      </ul>
    </li> --}}
       

    @can("admin")
      <li class="nav-item">
          <a href="{{route('admin.habilitations.users.index')}}" 
          class="nav-link {{SetMenuActive('admin.habilitations.users.index')}}">
            <i class=" nav-icon fas fa-users-cog"></i>
              <p>Utilisateurs</p>
          </a>
    </li>
    @endcan
      
    <li class="nav-item">
      <a href="{{route('stations')}}"
        class="nav-link {{SetMenuActive('stations')}}">
        <i class="nav-icon fas fa-home fa-3x"></i>
        <p>Stations</p>
      </a>
    </li>  

    {{-- <li class="nav-item">
      <a href="{{ route('chercheurs') }}"
        class="nav-link {{SetMenuActive('')}}">
        <i class="nav-icon fas fa-users"></i>
        <p>Chercheurs</p>
      </a>
    </li>  --}}
    
  </ul>
</nav>