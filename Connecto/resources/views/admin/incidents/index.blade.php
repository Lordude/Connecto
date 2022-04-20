@extends('layouts.admin.incidents.app')

@section('title', 'Incidents')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

    <h2>Gestion des incidents</h2>

    <button type="button" class="btn btn-warning">Créer un incident</button>
    <div>
        {{-- quand on clic sur 'créer un incident' le formulaire ci-dessous apparait --}}
        <h3>Nouvel incident</h3>
        <p>Choisir le services affectés</p>
        <select name="incident">
            <?php
            foreach ($incidents as $incident) {
                echo '<option value="' . $incident . '">' . $incident . '</option>';
            }
            ?>
        </select>
        <p>Choisir l'état services affectés</p>
        <select name="service">
            <?php
            
            ?>
        </select>
    </div>

    {{-- vue des incidents en cours --}}
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
            <td><button type="button" class="btn btn-warning">Modifier l'incident</button></td>
        </tr>
    </table>

@endsection
