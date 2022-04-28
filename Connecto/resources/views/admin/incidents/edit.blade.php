@extends('layouts.admin.incidents.app')

@section('title', 'Modifier un statut')

@section('content')
    <h2>Modifier le statut</h2>
    <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
        <div>
            @foreach ($incident->services as $service)
                <h3>
                    <ul class="list-group">
                        <li class="list-group-item">Service: {{ $service->name }} </li>
                    </ul>
                </h3>
            @endforeach
            <h4 class="text-danger">Actuellement :{{ $service->get_service_state($service->id)->first()->name }}</h4>
        </div>
        <div>
            <label for="name" class="form-label">État du service</label>
            <select class="form-select" name="state" id="states">

                <option value="state" selected="selected" disabled>
                    {{ $service->get_service_state($service->id)->first()->name }}
                </option>

                @foreach ($states as $state)
                    {{-- <option class="list-group-item"><input class="form-check-input me-1" type="checkbox" id="service"
                            name="services[]" value="{{ $state->id }}"></option>
                            <label>for="service">{{ $state->name }}</label></li> --}}
                    <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                @endforeach
            </select>
            <label for="commentary">Commentaire</label>
            <input type="text" id="commentary" name="commentary">
            <div>
                </select>
            </div>
        </div>
        <input type="submit" value="Enregistrer" class="btn btn-primary">
        <a href="{{ route('admin.incidents.index') }}" class="btn btn-secondary"> Retour </a>
    </form>
@endsection
