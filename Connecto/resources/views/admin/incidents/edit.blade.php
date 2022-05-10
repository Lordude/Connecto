@extends('layouts.admin.app')

@section('title', 'Modifier un statut')

@section('content')
    <div class="col-9">
        <h1>Modifier le statut</h1>
        <hr>
        {{-- <div> --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach ($incident->services as $service)
        <div class="row input-group mb-3">
                    @if ($incident->services->count() > 1)
                    <button type="button" class="col btn">
                        <form method="POST"
                            action="{{ route('admin.services.deleteServiceFromIncidentService', $service->id) }}"
                            class="mb-0">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="x" class="btn btn-danger" onclick="return confirm
                                    ('êtes-vous sûr de vouloir remettre ce service opérationnel? Il sera alors retiré de l\'incident en cours')" />
                        </form>
                    </button>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $service->name }}</li>
                    </ul>
                </div>
            @endforeach
            <p class="text-danger">Actuellement : {{ $service->get_service_state($service->id)->first()->name }}</p>
        <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
            @csrf
            @method('PUT')
            <div class="w-25">
                <label for="name" class="form-label">État du service</label>
                <select class="form-select" name="state" id="states">

                    <option value="state" selected="selected" disabled>
                        {{ $service->get_service_state($service->id)->first()->name }}
                    </option>
                    @foreach ($states as $state)
                    @if($state->id != $incident->state_id)
                        <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                        @endif
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
    </div>
    </div>
@endsection
