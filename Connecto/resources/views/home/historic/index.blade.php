@extends('layouts.app')

@section('title', 'Historique')

@section('content')
    <h1>Historique de disponibilité</h1>
    <h2> uptime </h2>

    <button type="button" class="btn"><a href="{{ route('home.index') }}" >Retour à l'accueil</a></button>
    @if($incidents->count() > 0)
        <table class="table">
            <thead>
                <th>ID de l'incident</th>
                <th>Date de début</th>
                <th>Date de fin </th>
                <th>Commentaire</th>
                <th>Déclaré par </th>
                <th>Incident(s) affecté(s)<th>
            </thead>
            <tbody>
                @foreach ($incidents as $incident)
                    <tr>
                        <td>{{ $incident->id}} </td>
                        <td>{{ $incident->start_date}}</td>
                        <td>{{ $incident->end_date}} </td>
                        <td>{{ $incident->users->name}} </td>
                        

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif


@endsection