@extends('layouts.admin.incidents.app')

@section('title', 'Incidents')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

    <h2>Gestion des incidents</h2>

    <button onClick="incidentForm()" type="button" class="btn btn-warning">Créer un incident</button>
    <div>
        {{-- quand on clic sur 'créer un incident' le formulaire ci-dessous apparait --}}
        <div class="row">
            <div class="col6 col-lg-6">

                <form id="hidden" method="POST" action="{{ route('admin.incidents.store') }}">
                    @csrf

                    <h3>Nouvel incident</h3>
                    {{-- {{$incidents->incidentFormClose()}} --}}
                    <div class="mb-3 container">
                        <label for="services">Choisir les services affectés</label>

                        @foreach ($services as $service)
                            <ul class="list-group">
                                <li class="list-group-item"><input class="form-check-input me-1" type="checkbox" id="service"
                                        name="services[]" value="{{ $service->id }}"><label
                                        for="service">{{ $service->name }}</label></li>
                            </ul>
                        @endforeach
                        {{-- code pour afficher seulement les services qui ne sont pas affectés a une panne. Problème de requête à résoudre --}}
                        {{-- @foreach ($services as $service)
                            <ul class="list-group">
                                <li class="list-group-item"><input class="form-check-input me-1" type="checkbox" id="service"
                                    name="services[]" value="{{ $service->id }}">
                                    <label for="service">{{ $service->hiddeService($service->id)}}</label></li>
                                </ul>
                                @endforeach --}}

                        <hr />
                        <div class="mb-3">
                            <label for="states">État du service</label>
                            <select name="state" id="states">
                                <option value="" selected="selected" disabled>choisir</option>
                                <?php
                            use App\Models\State;
                            $states = State::all();
                            foreach ($states as $state){
                                if($state['id'] > 1){
                                ?>

                                <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                <?php }} ?>
                            </select>
                            <hr />
                            <label for="commentary">Commentaire</label>
                            <input type="text" id="commentary" name="commentary">
                            <hr />
                            <hr />
                            <input type="hidden" id="start_date" name="start_date">

                            <input type="submit" value="créer le nouvel incident" class="btn btn-primary">
                            <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
    {{-- vue des incidents en cours --}}
    <tbody>
        <div>
            <table class="table container-md">
                <thead>
                    <h2>Incidents</h2>

                    <th>Service affecté</th>
                    <th>État</th>
                    <th></th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Administrateur</th>
                    <th>Option</th>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)
                        @if ($incident->end_date == null)
                            <tr>
                                <td>
                                    @foreach ($incident->services as $service)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{ $service->name }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $service->get_service_state($service->id)->first()->name }}</td>
                                <td><img src="{{ asset('image/') . $service->get_service_image($service->id) }}"
                                        alt="icone" /></td>
                                {{-- <td><img src="{{ asset('image/ {$service->get_service_image($service->id}' )}}" alt="icone"/></td> --}}
                                <td>{{ $incident->commentary }}</td>
                                <td>{{ $incident->start_date }}</td>
                                <td>{{ $incident->adminIncident($incident->user_id)->first()->first_name }}
                                    {{ $incident->adminIncident($incident->user_id)->first()->last_name }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning">
                                        <a href="{{ route('admin.incidents.edit', ['incident' => $incident]) }}"
                                            class="btn btn-link">Modifier</a>
                                    </button>
                                    {{-- en cliquant sur modifier, le formulaire va devenir éditable --}}
                                </td>

                            </tr>
                </tbody>
                {{-- @else --}}
                {{-- <p> Aucun services à afficher présentement </p> --}}
                @endif
                @endforeach
            </table>
        @endsection
