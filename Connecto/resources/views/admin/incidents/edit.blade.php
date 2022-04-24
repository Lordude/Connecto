@extends('layouts.admin.app')

@section('title', 'Ajouter un service')

@section('content')
    <h1>Modifier le statut</h1>
    <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
        <div>
            {{-- <label for="name" class="form-label">Nom du service</label> --}}
            @foreach ($incident->services as $service)
                <h3>Service: {{ $service->name }} </h3>
                <h4 class="text-danger">Actuellement en {{ $service->get_service_state($service->id)->first()->name }}</h4>
        </div>
        <div>
            <label for="name" class="form-label">État du service</label>
            <select class="form-select" name="state" id="states">
                <option value="state" selected="selected" disabled>{{ $service->get_service_state($service->id)->first()->name }}</option>
                @foreach ($states as $state)
                    <option> {{ $state->name }} </option>
                @endforeach
            </select>
            @endforeach
        </div>
        <input type="submit" value="Enregistrer" class="btn btn-primary">
        <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary"> Retour </a>
    </form>
@endsection
