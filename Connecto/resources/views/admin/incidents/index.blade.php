@extends('layouts.admin.incidents.app')

@section('title', 'Incidents')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

    <h2>Gestion des incidents</h2>

    <button type="button" class="btn btn-warning">Créer un incident</button>
    <div>
<h3>Nouvel incident</h3>
<p>Choisir l'état des services affectés</p>
    </div>
    <table class="table">
        <thead>
            <th>Incident</th>
            <th>Service affecté</th>
            <th>État</th>
            <th>Date de début</th>
            <th>Dure depuis</th>
            <th>Option</th>
        </thead>
        <tr>
            <td>/</td>
            <td>/</td>
            <td>/</td>
            <td>/</td>
            <td>/</td>
            <td><button type="button" class="btn btn-warning">Modifier un incident</button></td>
        </tr>
    </table>

@endsection
