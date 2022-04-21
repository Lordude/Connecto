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
                            <?php
                            use App\Models\Service;
                            $services = Service::all();
                            foreach ($services as $service){ ?>
                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                            <?php } ?>
                        </select>
                        <hr />
                        <div class="mb-3">
                            <label for="states">État du service</label>
                            <select name="states" id="states">
                                <option value="" selected="selected" disabled>choisir</option>
                                <?php
                            use App\Models\State;
                            $states = State::all();
                            foreach ($states as $state){ ?>
                                <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                <?php } ?>
                            </select>
                            <hr />
                            <input type="submit" value="créer le nouvel incident" class="btn btn-primary">
                            <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
    {{-- vue des incidents en cours --}}
    <table class="table">
        <thead>
            <h2>Incidents</h2>

            <th>Service affecté</th>
            <th>État</th>
            <th>Description</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Option</th>
        </thead>
        <tbody>

            @foreach ($incidents as $incident)
                <tr>
                    <td>/</td>
                    {{-- <td>{{ $service->name }}</td> --}}
                    <td>{{ $incident->state_id }}</td>
                    <td>{{ $incident->description }}</td>
                    <td>{{ $incident->start_date }}</td>
                    <td>{{ $incident->end_date }}</td>
                    <td>
                        <button type="button" class="btn btn-warning"><a
                                href="{{ route('admin.incidents.index', ['incident' => $incident]) }}"
                                class="btn btn-link">Modifier</a></button>
                        {{-- en cliquant sur modifier, le formulaire va devenir éditable --}}
                    </td>
            @endforeach
            </tr>

        </tbody>
    </table>

@endsection
