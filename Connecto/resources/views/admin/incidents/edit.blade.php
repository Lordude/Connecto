@extends('layouts.admin.app')

@section('title', 'Ajouter un service')

@section('content')
    <h1>Modifier le statut</h1>
    <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="form-label">Nom du service</label>
            @foreach ($incident->services as $service)
                <p> {{ $service->name }} </p>
        </div>
        <div>
            <label for="name" class="form-label">État du service</label>
            <select name="state" id="states">
                <option value="" selected="selected" disabled>choisir</option>
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
