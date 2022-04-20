@extends('layouts.admin.incidents.app')

@section('title', 'Incidents')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

    <h2>Gestion des incidents</h2>

    <button type="button" class="btn btn-warning">Créer un incident</button>
    <div>
        {{-- quand on clic sur 'créer un incident' le formulaire ci-dessous apparait --}}
        <div class="row">
            <div class="col6 col-lg-6">
                <form method="POST" action="{{ route('admin.incidents.store') }}">
                    @csrf

                    <h3>Nouvel incident</h3>

                    <div class="mb-3">
                        <label for="services">Service affecté</label>
                        <select name="services" id="services">
                            <option value="" selected="selected" disabled>choisir</option>
                            <?php foreach ($services as $service){ ?>
                                <option value="<?= $service['id']; ?>"><?= $service['name']; ?></option>
                            <?php } ?>
                        </select>

                    {{-- <div class="mb-3">
                        <label for="states">État du service</label>
                        <select name="states" id="states">
                            <option value="" selected="selected" disabled>choisir</option>
                            <?php foreach ($states as $state){ ?>
                                <option value="<?= $state['id']; ?>"><?= $state['name'], $state['description'], $state['image']; ?></option>
                            <?php } ?>
                        </select> --}}


                    <input type="submit" value="sauvegarder" class="btn btn-primary">
                    <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary">Retour</a>
                </form>
            </div>
        </div>
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
