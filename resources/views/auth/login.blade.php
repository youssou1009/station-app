@extends('layouts.auth')

@section('container')

    <div class="container col-md-12">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light col-md-12" style="background-color: rgba(173, 216, 230, 0.8);">
<link rel="stylesheet" href="{{mix("css/app.css")}}"/>
@livewireStyles
<ul class="navbar-nav">


<ul class="navbar-nav justify-content-between mr-auto">
    {{-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li> --}}
    <li class="nav-item" style="margin-right: auto;">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <img src="/images/logo2.pNg" alt="Logo" style="max-width: 90px; max-height: 33px;">
    </a>
    </li>
    
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Accueil</a>
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


<div class="login-box login-background offset-md-4 mt-5" style="display: flex; justify-content: center; align-items: center;">
    <div class="login-logo">
        {{-- <a href="../../index2.html"><b>Admin</b>LTE</a> --}}
    </div>

    <div class="card">
    <div class="card-body login-card-body">
    <p class="login-box-msg">Entrez votre e-mail et votre mot de passe pour vous connectez !</p>
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="input-group mb-3">
    <input type="email" placeholder="Email" class="form-control @error('email') 'is-invalid' @enderror" name="email" 
    value="{{ old('email') }}" required autocomplete="email" autofocus>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password"
class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">


{{-- <div class="col">
<a href="forgot-password.html">I forgot my password</a>
<button type="submit" class="btn btn-primary btn-block col-md-6">Se connecter</button>

</div> --}}
<div class="col">
    <div class="row">
        
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </div>
    </div>
</div>

</div>
</form>

</div>

</div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
