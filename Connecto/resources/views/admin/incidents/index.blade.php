@extends('layouts.admin.app')

@section('title', 'Incidents')

@section('content')

    <div class="col-9">

        <h1>Gestion des incidents</h1>

        <h3> Taux de disponibilité :
            <?php
            echo App\Models\Incident::get_Uptime() . '%';
            ?>
        </h3>
        <hr />
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button onClick="incidentForm()" type="button" class="btn btn-warning text-white">Créer un incident</button>
        {{-- quand on clic sur 'créer un incident' le formulaire ci-dessous apparait --}}
        <div>
            <form data-status='@if ($errors->any()) open @endif' id="incidentForm" method="POST"
                action="{{ route('admin.incidents.store') }}">
                <a href="{{ route('admin.incidents.index') }}" class="btn text-danger">Annuler</a>
                @csrf
                <div class="tableIncident">
                    <h3 class="incidentTitle">Nouvel incident</h3>
                    <div class="mb-3 container p-2">
                        <label class="incidentTitle2" for="services">Choisir les services affectés *</label>
                        <div class="incidentForm">
                            @foreach ($services as $service)
                                {{-- si l'incident est ouvert (requete dans model service)
                            on affiche les services reliés grisés pour éviter de créer 2 fois le même service en panne --}}
                                @if ($service->hasOpenIncident())
                                    <ul class="list-group incidentServicesForm">
                                        <li class="list-group-item disabled text-danger"><input
                                                class="form-check-input me-1" type="checkbox"
                                                id="service_{{ $service->id }}" name="services[]"
                                                value="{{ $service->id }}">
                                            <label for="service_{{ $service->id }}">{{ $service->name }}
                                                (incident en cours)
                                            </label>
                                        </li>
                                    </ul>
                                    {{-- si il n'y a pas d'incident relié, on affiche les services normalement --}}
                                @else
                                    <ul class="list-group incidentServicesForm">
                                        <a href="#" class="list-group-item"><input class="form-check-input me-1"
                                                type="checkbox" id="service_{{ $service->id }}" name="services[]"
                                                value="{{ $service->id }}">
                                            <label for="service_{{ $service->id }}">{{ $service->name }}</label>
                                        </a>
                                    </ul>
                                @endif
                            @endforeach
                        </div>
                        <hr />
                        <div class="mb-3">
                            <label for="state">Choisir l'état du ou des services affectés *</label>
                            <select class="option" name="state" id="state">
                                <option value="" selected="selected" disabled>choisir</option>
                                @foreach ($states as $state)
                                    @if ($state->id > 1)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <hr />
                        <label for="commentary">Commentaire</label>
                        <input class="option" type="text" id="commentary" name="commentary">

                        @foreach ($users as $user)
                            @if (session('emailUser') == $user->email)
                                <input type="hidden" id="emailUser" name="emailUser" value="{{ $user->id }}">
                            @endif
                        @endforeach
                        <hr />
                        {{-- <input type="hidden" id="start_date" name="start_date" value=""> --}}
                        <?php
                        use Carbon\Carbon;
                        ?>
                        <label for="date">Date et heure de l'incident *</label>
                        <input class="option" type="datetime-local" id="start_date" name="start_date"
                            max="{{ Carbon::now()->format('Y-m-d\TH:i:s') }}"><hr/>
                        <input type="submit" value="créer le nouvel incident" class="btn btn-warning text-white">
                        <a href="{{ route('admin.incidents.index') }}" class="btn text-danger">Annuler</a>

            </form>

        </div>
    </div>
    {{-- vue des incidents en cours --}}
    <div>
        <table class="table container-md">
            <thead>
                <th>Service affecté</th>
                <th>État</th>
                <th></th>
                <th>Commentaire</th>
                <th>Début de l'incident</th>
                <th>Dure depuis </th>
                <th>Administrateur</th>
                <th>Option</th>
            </thead>
            <tbody>
                <h3 class="text-center"> Incident ouvert </h3>
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
                            <td> <img width="42px" height="42px"
                                    src="../image/{{ $incident->get_incident_image($incident->id)->first()->image }}"
                                    alt="Icone de l\'etat du service {{ $service->get_service_image($service->id)->first()->image }}">
                            </td>

                            <td>{{ $incident->commentary }}</td>
                            <td>{{ $incident->start_date }}</td>
                            <td>{{ $incident->incidentOpenSince() }} heures</td>
                            <td>{{ $incident->adminCreateIncident($incident->user_id)->first()->first_name }}
                                {{ $incident->adminCreateIncident($incident->user_id)->first()->last_name }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning">
                                    <a href="{{ route('admin.incidents.edit', ['incident' => $incident]) }}"
                                        class="btn btn-link">Modifier</a>
                                </button>
                            </td>

                        </tr>
                    @endif
            </tbody>
            @endforeach
            @if ($service->hasOpenIncident() == 0)
                <p class="mx-auto text-center bg-success p-2 text-dark bg-opacity-10 rounded-2 w-50"> Aucun incidents à afficher présentement </p>
            @endif

            <tbody>
                <div>
                    <table class="table container-md">
                        <thead>
                            <th>Service affecté</th>
                            <th>Commentaire</th>
                            <th>Début de l'incident</th>
                            <th>Fermé</th>
                            <th>Durée en heure </th>
                            <th>Durée en jour </th>
                            <th>Administrateur</th>
                        </thead>
                        <tbody>
                            <h3 class="text-center"> Incident fermé </h3>
                            @foreach ($incidents as $incident)
                                @if ($incident->end_date !== null)
                                    <tr>
                                        <td>
                                            @foreach ($incident->services as $service)
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">{{ $service->name }}</li>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td>{{ $incident->commentary }}</td>
                                        <td>{{ $incident->start_date }}</td>
                                        <td>{{ $incident->end_date }} </td>
                                        <td>{{ $incident->incidentOpenSince() }} heures</td>
                                        @if ($incident->incidentOpenSinceDays() > 0)
                                            <td>{{ $incident->incidentOpenSinceDays() }} jours</td>
                                        @else
                                            <td> / </td>
                                        @endif
                                        <td>{{ $incident->adminCreateIncident($incident->user_id)->first()->first_name }}
                                            {{ $incident->adminCreateIncident($incident->user_id)->first()->last_name }}
                                        </td>
                                    </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
    </div>
@endsection
