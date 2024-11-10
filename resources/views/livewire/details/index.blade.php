<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la station</title>
    <style>
        /* Vos styles CSS ici */
        body {
            font-family: Arial, sans-serif; /* Changer la police du texte */
            text-align: center; /* Aligner le texte horizontalement */
        }
        .station-details {
            width: 80%; /* Définir une largeur pour le conteneur */
            margin: 0 auto; /* Centrer le conteneur */
            text-align: left; /* Aligner le texte à gauche */
        }
        .detail-item {
            margin-bottom: 20px; /* Augmentez cette valeur pour augmenter l'espace entre les éléments */
            text-align: left; /* Aligner le texte à gauche */
        }
        .photo img {
            display: block; /* Pour centrer l'image horizontalement */
            margin: 0 auto; /* Centrer l'image horizontalement */
        }
    </style>
</head>
<body>
    <div class="station-details">
        <h2>Détails de la station</h2>
        <div class="detail-item">
            <span class="label">Nom:</span>
            <span class="value">{{ $station->nom }}</span>
        </div>
        <div class="detail-item">
            <span class="label">Région:</span>
            <span class="value">{{ $station->departement->region->nom }}</span>
        </div>
        <div class="detail-item">
            <span class="label">Département:</span>
            <span class="value">{{ $station->departement->nom }}</span>
        </div>
        <div class="detail-item">
            <span class="label">Latitude:</span>
            <span class="value">{{ $station->latitude }}</span>
        </div>
        <div class="detail-item">
            <span class="label">Longitude:</span>
            <span class="value">{{ $station->longitude }}</span>
        </div>
        <div class="detail-item">
            <span class="label">Altitude:</span>
            <span class="value">{{ $station->altitude }}</span>
        </div>
        <div class="detail-item">
            {{-- <span class="label">Ajouté par:</span>
            <span class="value">{{ $station->user->prenom }} {{ $station->user->nom }}</span> <!-- Remplacez "name" par le nom du champ de l'utilisateur --> --}}
            <!-- Remplacez "prenom" par le nom du champ de l'utilisateur -->
        </div>
        <div class="photo">
            @if($station->photo)
                <img src="{{ $station->photo }}" alt="Photo de la station">
            @else
                {{-- <p>Aucune photo disponible</p> --}}
            @endif
        </div>
    </div>

    
        <a href="{{ route('stations') }}" style="text-decoration: none;">
        <div class="col-md-3">
            <button style="padding: 8px 12px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Retour</button>
        </div>
        </a>
    
</body>
</html>