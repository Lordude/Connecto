@extends('layouts.admin.app')

@section('title', 'Modifier un statut')

@section('content')
    <h2>Modifier le statut</h2>
    <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
        <div>
            @foreach ($incident->services as $service)
                <h3>Service: {{ $service->name }} </h3>
                <h4 class="text-danger">Actuellement :{{ $service->get_service_state($service->id)->first()->name }}
                </h4>
        </div>
        <div>
            <label for="name" class="form-label">État du service</label>
            <select class="form-select" name="state" id="states">
                <option value="state" selected="selected" disabled>
                    {{ $service->get_service_state($service->id)->first()->name }}</option>

                @foreach ($states as $state)
                    <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                   
                @endforeach
            </select>
            <label for="commentary">Commentaire</label>
            <input type="text" id="commentary" name="commentary">

            {{-- ne fonctionne pas --}}

            {{-- <label for="name" class="form-label">Administrateur</label>

                <select class="form-select" name="state" id="states">

                    <option value="user" selected="selected" disabled>
                        {{ $incident->adminIncident($incident->user_id)->first()->first_name }}
                        {{ $incident->adminIncident($incident->user_id)->first()->last_name }}</option>

                    {{-- @foreach ($users as $user) --}}
            {{-- <option> {{ $incident->adminIncident($incident->user_id)->first()->first_name }} </option> --}}
            {{-- @endforeach --}}

            {{-- </select> --}}
            @endforeach

        </div>
        <input type="submit" value="Enregistrer" class="btn btn-primary">
        <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary"> Retour </a>
    </form>
@endsection
