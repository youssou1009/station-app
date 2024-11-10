{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | FAQ</title>

<link rel="stylesheet" href="{{mix("css/app.css")}}"/>
@livewireStyles

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>FAQ</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">FAQ</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="row">
<div class="col-12" id="accordion">
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
<div class="card-header">
<h4 class="card-title w-100">
1. Comment accèder à l'application ?
</h4>
</div>
</a>
<div id="collapseOne" class="collapse show" data-parent="#accordion">
<div class="card-body">
    Rendez-vous sur la page <a href="/" class="nav-link">Se connecter</a>. <br />
    Cett section permet à un utilisateur de s'authentifier pour accèder à l'application.<br />
    Avant l'accès vous devez obligatoirement fournir:
    <ul>
          <li>Une adresse e-mail valide</li>
          <li>Un mot de passe</li>  
    </ul>
    <p class="text-danger">Une fois vous n'avez pas de compte vous pouvez faire une demande de création de compte à un administrateur.<br /></p>
    Si le compte est créer, un lien vous sera envoyé sur votre e-mail pour que vous puissiez choisir un mot de passe. <br />
    .
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
<div class="card-header">
<h4 class="card-title w-100">
2. Comment se connecter ?
</h4>
</div>
</a>
<div id="collapseTwo" class="collapse" data-parent="#accordion">
<div class="card-body">
    Rendez-vous sur la page <a href="/"> se connecter</a>. <br />
    Dans la section "Se connecter", entrez votre e-mail et le mot de passe que vous avez choisi.
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
<div class="card-header">
<h4 class="card-title w-100">
3. Comment changer mon mot de passe ? J'ai oublié mon mot de passe, que faire ?
</h4>
</div>
</a>
<div id="collapseThree" class="collapse" data-parent="#accordion">
<div class="card-body">
Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
</div>
</div>
</div>
<div class="card card-warning card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
<div class="card-header">
<h4 class="card-title w-100">
4. Donec pede justo
</h4>
</div>
</a>
<div id="collapseFour" class="collapse" data-parent="#accordion">
<div class="card-body">
Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
</div>
</div>
</div>
<div class="card card-warning card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
<div class="card-header">
<h4 class="card-title w-100">
5. In enim justo
</h4>
</div>
</a>
<div id="collapseFive" class="collapse" data-parent="#accordion">
<div class="card-body">
In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
</div>
</div>
</div>
<div class="card card-warning card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
<div class="card-header">
<h4 class="card-title w-100">
6. Integer tincidunt
</h4>
</div>
</a>
<div id="collapseSix" class="collapse" data-parent="#accordion">
<div class="card-body">
Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
</div>
</div>
</div>
<div class="card card-danger card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
<div class="card-header">
<h4 class="card-title w-100">
7. Aenean leo ligula
</h4>
</div>
</a>
<div id="collapseSeven" class="collapse" data-parent="#accordion">
<div class="card-body">
Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
</div>
</div>
</div>
<div class="card card-danger card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
<div class="card-header">
<h4 class="card-title w-100">
8. Aliquam lorem ante
</h4>
</div>
</a>
<div id="collapseEight" class="collapse" data-parent="#accordion">
<div class="card-body">
Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
</div>
</div>
</div>
<div class="card card-danger card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
<div class="card-header">
<h4 class="card-title w-100">
9. Quisque rutrum
</h4>
</div>
</a>
<div id="collapseNine" class="collapse" data-parent="#accordion">
<div class="card-body">
Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12 mt-3 text-center">
<p class="lead">
<a href="contact-us.html">Contactez-nous </a>,
si vous n'avez pas trouvé la bonne réponse ou si vous avez une autre question ?<br/>
</p>
</div>
</div>
</section>
<script src="{{mix("js/app.js")}}"></script>
@livewireScripts

</body>
</html>
 --}}

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content=
"width=device-width, initial-scale=1">
    <title>SEN METEO</title>
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous" integrity=
"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN">
</head>
 
<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    {{-- yyyyyyyyyy --}}
    {{-- yyyyyyyyyy --}}
    <div class=
    "container rounded m-5 p-5 text-light text-center" >
        
        <h1 class="text-center">FAQ</h1>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                       1. Comment accèder à l'application ?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{-- <strong>GeeksforGeeks</strong>  --}}
                        Rendez-vous sur la page <a href="/" class="nav-link">Se connecter</a>. <br />
                        Cett section permet à un utilisateur de s'authentifier pour accèder à l'application.<br />
                        Avant l'accès vous devez obligatoirement fournir:
                        <ul>
                            <li>Une adresse e-mail valide</li>
                            <li>Un mot de passe</li>  
                        </ul>
                        <p class="text-danger">Une fois vous n'avez pas de compte vous pouvez faire une demande de création de compte à un administrateur.<br /></p>
                        Si le compte est créer, un lien vous sera envoyé sur votre e-mail pour que vous puissiez choisir un mot de passe. <br />
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        2. Comment se connecter ?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="card-body">
                            Rendez-vous sur la page <a href="/"> se connecter</a>. <br />
                            Dans la section "Se connecter", entrez votre e-mail et le mot de passe que vous avez choisi.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        3. Comment changer mon mot de passe ? J'ai oublié mon mot de passe, que faire ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Si vous-voulez changer votre mot de passe  ?
                        </strong> 
                        Allez cliquez sur le bouton déconnexion un menu contenant mot de passe
                        et profil s'affiche. cliquez ensuite sur mot de passe pour changer
                        votre mot de passe 
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        4. Que puis-je faire sur l'interface d'accueil ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            
                        </strong> 
                        Where is the global headquarters of GeeksForGeeks? 
                        Global headquarters for GeeksForGeeks is located in Noida, 
                        Uttar Pradesh,India.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        5.  Comment ajouter une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour ajouter une station :
                        </strong> 
                        


                         <p>Rendez-vous à la page <a>d'accueil</a>  cliquez sur station et cliquez sur l'icone ajouter station</p>
                        Pour ajouter une station il faut obligatoirement:
                        <ul>
                        <li>Un nom</li>
                        <li>Une région</li>
                        <li>Une département</li>
                        <li>La latitude</li>
                        <li>La  longitude</li>
                        <li>L'altitude</li>
                        <li>Une date de création</li>
                        </ul>

        

                    </div>
                </div>
            </div>








            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        6.  Comment modifier une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour modifier une station :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous à la page <a>liste des stations</a> et cliquez sur le bouton editer <i class="far fa-edit"></i> de la station à modifier.</li>
                            
                            </ul>
                        
                        </div>

        

                    </div>
                </div>
            </div>






            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        7.  Comment supprimer une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour supprimer une station :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous à la page <a>liste des stations</a> et cliquez sur l'icone supprimer <i class="far fa-edit"></i> de la station à supprimer.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




             <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        8.  Comment ajouter une donnée dans une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour ajouter une donnée dans station :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous à la page <a>liste des stations</a> et cliquez sur l'icone bleu <i class="far fa-edit"></i> de la station concerner.</li><br>
                            cliquez ensuite sur le lien "mes stations" si l'utilisateur qui est connecter est un chercheur
                            clicquez ensuite sur le lien "ajouter une donnée"
                            <p>le formulaire va s'afficher valider par le bouton enrégistrer aprés avoir ajouter des données</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>






             <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        9.  Comment visualiser les données d'une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour visuliser les données d'une station :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous à la page <a>liste des stations</a> et cliquez sur l'icone bleu <i class="far fa-edit"></i> de la station concerner. maintenant vous-pouvez voir la liste des données de cette station </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




             <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        10.  Comment télécharger une graphique ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour télécharger une graphique :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous toujours à la page <a>liste des stations</a> et cliquez sur l'icone bleu <i class="far fa-edit"></i> de la station concerner</li>
                            vous allez acceder à une page nommée graphique qui contient un lien en au milieu de
                            la page nommé aussi graphique. cliquez sur ce dernier pour avoir la possibilité de visualiser et de télécharger le graphique.
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




             <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        11.  Comment voir les détails d'une station ?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>
                            Pour voir les détails d'une station :
                        </strong> 
                        


                        <div class="card-body">
                            <ul>
                            <li>Rendez-vous toujours à la page <a>liste des stations</a> et cliquez sur l'icone de l'oeil <i class="far fa-edit"></i> de la station concerner</li>
                            et vous-allez voir tous les détails de cette station.
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/" class="nav-link" style="color: blue;">Retour à l'accueil</a>
    </div>
 
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
</body>
 
</html>