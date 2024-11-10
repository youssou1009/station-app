


{{-- AZERTYUIOQSDFGHJK --}}
     <!-- ... Votre code existant ... -->

    <div class="container col-md-12">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light col-md-12" style="background-color: rgba(173, 216, 230, 0.8);">
<link rel="stylesheet" href="{{mix("css/app.css")}}"/>
@livewireStyles
<ul class="navbar-nav">
{{-- <li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="/faq" class="nav-link">FAQ</a>
</li>
<li class="nav-item d-none d-sm-inline-block">

<!-- Lien "Contact" avec attributs pour ouvrir la fenêtre modale -->
<a href="#" class="nav-link" onclick="openContactModal()">Contact</a> --}}

<ul class="navbar-nav justify-content-between mr-auto">
    {{-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li> --}}
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <img src="/images/logo2.pNg" alt="Logo" style="max-width: 100px; max-height: 35px;">
    </a>
    </li>
    
    <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Accueil</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/faq" class="nav-link">FAQ</a>
    </li>
</ul>
<ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" onclick="openContactModal()">Contact</a>
    </li>
</ul>

<!-- Fenêtre modale -->
<div id="contactModal" class="modal col-md-4 p-4 pt-5 offset-4">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Coordonnées du responsable</h5>
    </div>
    <div class="modal-body">
      <!-- Insérer l'email du responsable ici -->
      
      <p><span class="font-weight-bold">Email du responsable :</span> <span class="email-address">seraphindo@gmail.com</span></p>
      <p class="mr-2"><span class="font-weight-bold">Email de l'adjoint </span><span class="vertical-align-middle">: </span><span class="email-address">seyeyoussou17@gmail.com</span></p>
      <p><span class="font-weight-bold">Email du adjoint </span><span class="vertical-align-middle">: </span><span class="email-address">lamine.diouf@uadb.edu.sn</span></p>
    </div>
    <div class="modal-footer">
      <!-- Lien pour fermer la fenêtre modale -->
      <a href="#" class="btn btn-secondary" onclick="closeContactModal()">Fermer</a>
    </div>
  </div>
</div>

<script>
  // Fonction pour ouvrir la fenêtre modale
  function openContactModal() {
    var modal = document.getElementById('contactModal');
    modal.style.display = 'block';
  }

  // Fonction pour fermer la fenêtre modale
  function closeContactModal() {
    var modal = document.getElementById('contactModal');
    modal.style.display = 'none';
  }
</script>

</li>

</ul>

<ul class="navbar-nav ml-auto">
<ul class="navbar-nav">
<li class="nav-item d-none d-sm-inline-block">
<a href="auth/login" class="nav-link">Se connecter</a>
</li>
</ul>


</ul>
</nav>
      <!-- Carrousel d'images -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            {{-- <img src="{{asset('/images/isra2.png')}}" class="col" alt="Première image" style="filter: brightness(130%) contrast(90%);"> --}}
            <img src="{{asset('/images/isra1.png')}}" class="col" alt="Première image" style="filter: brightness(130%) contrast(90%);">
            <h2 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;
                background: linear-gradient(to bottom, white, white); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Application de gestion et de centralisation des données météorologiques sur l'ensemble du territoire sénégalais
            </h2>
          </div>
          <div class="carousel-item">
            <img src="{{asset('/images/meteo4.jpg')}}" class="d-block w-100" alt="Deuxième image" style="filter: brightness(130%) contrast(90%);">
          </div>
          <div class="carousel-item">
            <img src="{{asset('/images/image3.jpg')}}" class="d-block w-100" alt="Troisième image" style="filter: brightness(130%) contrast(90%);">
            <div class="carousel-caption text-dark text-center d-flex align-items-start justify-content-center" style="top: 0;">
              {{-- <h3>Titre de l'image</h3> --}}
              <p>Notre application offre une plateforme robuste et 
              conviviale pour la gestion et la centralisation des données 
              météorologiques provenant des différentes stations agronomiques 
              réparties à travers tout le territoire sénégalais. Conçue pour 
              répondre aux besoins spécifiques des chercheurs, des 
              agriculteurs et des décideurs, notre application fournit des outils 
              puissants pour collecter et visualiser les données météorologiques 
              cruciales pour l'agriculture et la gestion des ressources naturelles..</p>
              {{-- <div style="position: absolute; bottom: 0; left: 0; padding: 20px;">
                <hr>
                <p class="text-dark">stations de recherche agronomique</p>
                <p class="text-dark">nombre de station(s): {{ getStationCount() }}</p>
                <p class="text-dark">station(s) active(s): {{getStationExistDonneesCount()}}</p>
                <p class="text-dark">station(s) inactive(s): {{ getInactiveStationCount() }}</p>
              </div>

              <div class="col-md-3">
                <div style="position: absolute; bottom: 0; left: 20px; padding: 60px;">
                    <hr>
                    <p class="text-dark">données pluviométriques: {{ getPluviometrieCount() }}</p>
                    <p class="mb-0 text-dark">données températures: {{getTemperatureCount()}}</p>
                </div>
            </div> --}}

            {{-- yyyyyy --}}
            <div class="row" style="position: absolute; bottom: 0; left: 0; padding: 20px;">
              <div class="col">
                  <h4 class="alert-heading text-dark"><a><i class="fas fa-home fa-3x text-dark"></i>Stations</a> </h4>
                  <hr>
                  {{-- <p class="text-dark">stations de recherche agronomique</p>
                  <p class="text-dark">nombre de station(s): {{ getStationCount() }}</p>
                  <p class="text-dark">station(s) active(s): {{getStationExistDonneesCount()}}</p>
                  <p class="text-dark">station(s) inactive(s): {{ getInactiveStationCount() }}</p> --}}
                  <p class="text-dark"><strong>stations de recherche agronomique</strong></p>
<p class="text-dark"><strong>nombre de station(s):</strong> <strong>{{ getStationCount() }}</strong></p>
<p class="text-dark"><strong>station(s) active(s):</strong> <strong>{{ getStationExistDonneesCount() }}</strong></p>
<p class="text-dark"><strong>station(s) inactive(s):</strong> <strong>{{ getInactiveStationCount() }}</strong></p>
              </div>

              <div class="col">
                  <div class="text-center">
                    <h4 class="alert-heading text-dark"><i class="fas fa-tint fa-3x text-dark"></i>
                    Données <i class="fas fa-temperature-low fa-3x text-dark"></i> météorologique </h4>
                  </div>
                  
                  {{-- <div class="text-center">
                    <i class="fas fa-star fa-3x text-dark"></i>
                  </div> --}}
                  <hr>
                  <p class="text-dark"><strong>données pluviométriques:</strong> <strong>{{ getPluviometrieCount() }}</strong></p>
                  <p class="mb-0 text-dark"><strong>données températures:</strong> <strong>{{getTemperatureCount()}}</strong></p>
              </div>

              <div class="col">
                  <h4 class="alert-heading text-dark"><i class="fas fa-users fa-3x"></i>Utilisateurs </h4>
                  <hr>
                  <p class="text-dark"><strong>admin(s):</strong> <strong>{{ getAdminCount() }}</strong></p>
                  <p class="text-dark"><strong>stagiaire(s):</strong> <strong>{{getStagiaireCount()}}</strong></p>
                  <p class="text-dark"><strong>chercheur(s):</strong> <strong>{{getChercheurCount()}}</strong></p>
              </div>
      </div>
            {{-- yyyyyyyy --}}

            {{-- </div>
          </div>
        
          <div class="carousel-item">
            <div class="container">
      
    </div> --}}
    <script src="{{mix("js/app.js")}}"></script>
  </header>



  <!-- /#page-wrapper -->
</div>

          </div>
          {{-- fore --}}
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <!-- ... Votre code existant ... -->

    <!-- Ajout du script Bootstrap pour le carrousel -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  </header>
</div>
{{-- AZERTYUIOQSDFGHJK --}}


<!-- Masthead -->
<div class="overlay" style="background-image: url('/public/images/bg-masthead.jpg');">
  <header class="masthead text-white text-center">
    <link rel="stylesheet" href="{{mix("css/app.css")}}"/>
{{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="/faq" class="nav-link">FAQ</a>
</li>
<li class="nav-item d-none d-sm-inline-block">

<!-- Lien "Contact" avec attributs pour ouvrir la fenêtre modale -->
<a href="#" class="nav-link" onclick="openContactModal()">Contact</a>

<!-- Fenêtre modale -->
<div id="contactModal" class="modal col-md-4 p-4 pt-5 offset-4">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Coordonnées du responsable</h5>
    </div>
    <div class="modal-body">
      <!-- Insérer l'email du responsable ici -->
      <p>Email du responsable : seraphindo@gmail.com</p>
      <p>Email de adjoint : seyeyoussou17@gmail.com</p>
      <p>Email du adjoint : lamine.diouf@uadb.edu.sn</p>
    </div>
    <div class="modal-footer">
      <!-- Lien pour fermer la fenêtre modale -->
      <a href="#" class="btn btn-secondary" onclick="closeContactModal()">Fermer</a>
    </div>
  </div>
</div>

<script>
  // Fonction pour ouvrir la fenêtre modale
  function openContactModal() {
    var modal = document.getElementById('contactModal');
    modal.style.display = 'block';
  }

  // Fonction pour fermer la fenêtre modale
  function closeContactModal() {
    var modal = document.getElementById('contactModal');
    modal.style.display = 'none';
  }
</script>

</li>

</ul>

<ul class="navbar-nav ml-auto">
<ul class="navbar-nav">
<li class="nav-item d-none d-sm-inline-block">
<a href="auth/login" class="nav-link">Se connecter</a>
</li>
</ul>




</ul>
</nav> --}}



    

    