@extends('layouts.appN')
@section('title', 'calendar')

@section('content')

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Liste des Réunions</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="#">Acceuil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Réunion</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body calender-sidebar app-calendar">
            <div id="calendar"></div>
        </div>
    </div>
    </div>


@endsection

@section('css')

  

@endsection


@section('scripts')
     
    <script src="{{ asset('calendar/calendar-init.js') }}"></script> 
    <script src="{{ asset('calendar/index.global.min.js') }}"></script> 
   

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var today = new Date();

    var events = [
        @foreach($reunions as $reunion)
            {
                title: '{{ $reunion->sujet_reunion }}',
                start: '{{ $reunion->date_reunion }}',
                className: getEventClass('{{ $reunion->date_reunion }}')
            },
        @endforeach
    ];

    function getEventClass(eventDate) {
        var eventDateObj = new Date(eventDate);
        var timeDiff = eventDateObj.getTime() - today.getTime();
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

        if (diffDays < 0) {
            return "event-fc-color fc-bg-primary"; // Event happened in the past (blue)
        } else if (diffDays == 0) {
            return "event-fc-color fc-bg-success"; // Event is today (green)
        } else if (diffDays <= 3) {
            return "event-fc-color fc-bg-warning"; // Event is within 3 days (yellow)
        } else {
            return "event-fc-color fc-bg-danger"; // Event is in the future (red)
        }
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'fr',
        events: events,
        buttonText: {
            today:    'Aujourd\'hui',
            month:    'Mois',
            week:     'Semaine',
            day:      'Jour',
            list:     'Liste'
        }
    });

    calendar.render();
});



    </script>
  
@endsection
