@include('layouts.admin.headerAdmin')

@extends('layouts.admin.incidents.app')

@section('title', 'Modifier un statut')

@section('content')
    <h2>Modifier le statut</h2>
    <div>
        @foreach ($incident->services as $service)
                                    <button type="button" class="btn btn-warning">
                                        <form method="POST"
                                            action="{{ route('admin.services.deleteServiceFromIncidentService', $service->id) }}"
                                            class="mb-0">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="X" class="btn btn-link link-danger"
                                                onclick="return confirm('Are you sure?')" />
                                        </form>
                                    </button>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $service->name }}</li>
                                    </ul>
                                @endforeach
        <h4 class="text-danger">Actuellement :{{ $service->get_service_state($service->id)->first()->name }}</h4>
    </div>
    <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
        @csrf
        @method('PUT')
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
