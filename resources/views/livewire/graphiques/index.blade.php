<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendrier</title>

  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/main.min.css" rel="stylesheet" />
</head>
<body>

  <h1>Graphique</h1>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          Station: {{$station->nom}}
        </div>
        <div class="col-md-3">
          Région: {{$station->departement->region->nom}}
        </div>
        <div class="col-md-3">
          Département: {{$station->departement->nom}}
        </div>
        <div class="col-md-3" *ngIf="hasAccessToStation(station)">
          <a class="btn btn-success btn-sm">Importer des données <i class="fas fa-file-download fa-fw fa-1x white"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <!-- Données pluviométriques -->
      <div class="col-md-6">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="col-form-label">
              Données pluviométriques
            </label>
            <select class="form-control">
              <option>Sélectionner une option</option>
              <option>Mensuelle</option>
              <option>Annuelle</option>
              <option>Journalier</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Données températures -->
      <div class="col-md-6">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="col-form-label">
              Données températures
            </label>
            <select class="form-control">
              <option>Sélectionner une option</option>
              <option>Mensuelle</option>
              <option>Annuelle</option>
              <option>Journalier</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container col-md-5">
    <div class="alert alert-info">Veuillez sélectionner une option pour l'affichage des données</div>
  </div>

  <!-- Conteneur pour le calendrier -->
  <div id="calendar"></div>

  <!-- FullCalendar JS -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/main.min.js"></script>

  <!-- Initialisation du calendrier -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
          // Exemple d'événements à ajouter au calendrier
          {
            title: 'Événement Exemple',
            start: '2024-08-01',
            end: '2024-08-02'
          },
          {
            title: 'Réunion',
            start: '2024-08-10T10:00:00',
            end: '2024-08-10T12:00:00'
          }
        ]
      });

      calendar.render();
    });
  </script>

</body>
</html>
