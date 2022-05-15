@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app' )

@section('title', 'Historique')

@section('content')
<div class="col-md-9">
    
    <h1>Historique de disponibilité</h1>
    <hr>

    @if($incidents->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>ID de l'incident</th>
                <th>Date de début</th>
                <th>Date de fin </th>
                <th>Durée</th>
                <th>Commentaire</th>
                <th>Déclaré par </th>
                <th>Incident(s) affecté(s)<th>
            </thead>
            <tbody>
                @foreach ($incidents as $incident)
                    <tr>
                        <td>{{ $incident->id}} </td>
                        <td>{{ $incident->start_date}}</td>
                        <td> @if(!$incident->end_date)En cours @else {{$incident->end_date}}  @endif </td>
                        <td> 
                            @if($incident->incidentOpenSince() < 1)
                             Moins de 1 heure 
                             @else {{$incident->incidentOpenSince();}} heure(s)
                             @endif
                        </td>
                        <td> {{$incident->commentary}} </td>
                        <td> {{$incident->user->first_name}} {{$incident->user->last_name}} </td>
                        <td>
                        @foreach ($incident->services as $service)
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $service->name }}</li>
                        </ul>
                        @endforeach
                        </td>
                        

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif
</div>


@endsection