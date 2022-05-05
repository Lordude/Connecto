@include('layouts.admin.headerAdmin')

@extends('layouts.admin.incidents.app')

@section('title', 'Incidents')

@section('content')

<div class="col-9">

    <h2>
        Gestion des incidents</h2>

    <h3> GET THE UPTIME B*TCHES

        <?php
        // echo App\Models\Incident::get_Uptime() . '%';
     ?>
    </h3>
    <?php
    echo App\Models\Incident::time();
    ?>
    <hr />
    <button onClick="incidentForm()" type="button" class="btn btn-warning">Créer un incident</button>
    <div>
        {{-- quand on clic sur 'créer un incident' le formulaire ci-dessous apparait --}}
        <!-- <div class="row"> -->
            <div class="col6 col-lg-6">

                <form data-status='@if ($errors->any()) open @endif' id="incidentForm" method="POST"
                    action="{{ route('admin.incidents.store') }}">

                    <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary">Annuler</a>
                    @csrf
                    <h3>Nouvel incident</h3>
                    {{-- {{$incidents->incidentFormClose()}} --}}
                    <div class="mb-3 container">
                        <label for="services">Choisir les services affectés*</label>

                        @foreach ($services as $service)
                            {{-- si l'incident est ouvert (requete dans model service)
                            on affiche les services reliés grisés pour éviter de créer 2 fois le même service en panne --}}
                            @if ($service->hasOpenIncident())
                                <ul class="list-group">
                                    <li class="list-group-item disabled text-danger"><input class="form-check-input me-1"
                                            type="checkbox" id="service_{{ $service->id }}" name="services[]"
                                            value="{{ $service->id }}"><label
                                            for="service_{{ $service->id }}">{{ $service->name }}
                                            (incident en cours)
                                        </label></li>
                                </ul>
                                {{-- si il n'y a pas d'incident relié, on affiche les services normalement --}}
                            @else
                                <ul class="list-group">
                                    <li class="list-group-item"><input class="form-check-input me-1" type="checkbox"
                                            id="service_{{ $service->id }}" name="services[]" value="{{ $service->id }}"
                                            class="@error('services[]') is-invalid @enderror">

                                        @error('services[]')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label for="service_{{ $service->id }}">{{ $service->name }}</label>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                        <hr />
                        <div class="mb-3">
                            {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ 'Choisissez un état svp!' }}</div>
                        @endif --}}
                            <label for="states">État du service*</label>
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
                            <input type="text" id="commentary" name="commentary"
                                class="@error('commentary') is-invalid @enderror">

                            @error('commentary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <hr />

                            <?php
                            use App\Models\User;
                            $users = User::all();
                            ?>
                            @foreach ($users as $user)
                                @if (session('emailUser') == $user->email)
                                    <input type="hidden" id="emailUser" name="emailUser" value="{{ $user->id }}">
                                @endif
                            @endforeach
                            <hr />
                            <input type="hidden" id="start_date" name="start_date" value="">

                            <input type="submit" value="créer le nouvel incident" class="btn btn-primary">
                            <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
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
                    </tbody>
                    {{-- @else --}}
                    {{-- <p> Aucun services à afficher présentement </p> --}}
                    @endif
                    @endforeach

                    <tbody>
                        <div>
                            <table class="table container-md">
                                <thead>
                                    <h2>Incidents</h2>

                                    <th>Service affecté</th>
                                    <th>Commentaire</th>
                                    <th>Début de l'incident</th>
                                    <th>Fermé </th>
                                    <th>Administrateur</th>
                                </thead>
                                <tbody>
                                    <h3 class="text-center"> Incident fermé </h3>
                                    @foreach ($incidents as $incident)
                                        @if ($incident->end_date != null)
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

