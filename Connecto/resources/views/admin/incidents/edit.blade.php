@extends('layouts.admin.app')

@section('title', 'Modifier un statut')

@section('content')
    <div class="col-9">
        <h1 class="flexEditForm">Modifier le statut</h1>
        <hr>
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
            <div class=" flexDeleteGroup">
                @if ($incident->services->count() > 1)
                    <button type="button" class="col btn flexDeleteRow">
                        <form method="POST"
                            action="{{ route('admin.services.deleteServiceFromIncidentService', $service->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="button" class="btn-close" aria-label="Close" onclick="return confirm
                                ('êtes-vous sûr de vouloir remettre ce service opérationnel? Il sera alors retiré de l\'incident en cours')" />
                        </form>
                    </button>
                @endif
                <ul class="list-group list-group-flush flexDeleteRow">
                    <li class="list-group-item">{{ $service->name }}</li>
                </ul>
            </div>
        @endforeach
        <div class="flexEditForm"> <p class="text-info">Statut actuel :
            {{ $incident->state->name }}
            </p>
            {{-- <img width="42px" height="42px"
            src="../image/{{ $incident->state->image }}"
            alt="Icone de l\'etat du service {{ $incident->state->image }}"> --}}
            <form method="POST" action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
                @csrf
                @method('PUT')
                {{-- <div class="w-25"> --}}
                <label for="name" class="form-label">Modifier l'état à :</label>
                <select class="form-select editState" name="state" id="states">

                    <option value="state" selected="selected" disabled>
                        {{ $incident->state->name }}
                    </option>
                    @foreach ($states as $state)
                        @if ($state->id != $incident->state_id)
                            <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                        @endif
                    @endforeach
                </select>
                <br />
                <label for="commentary">Commentaire</label>
                <input class="option" type="text" id="commentary" name="commentary">
                <div>
                    </select>
                </div>
        </div>
        <div class="editFormButton">
            <input type="submit" value="Enregistrer" class="btn btn-warning text-white">
            <a href="{{ route('admin.incidents.index') }}" class="btn text-danger"> Retour </a>
        </div>
        </form>
    </div>
    </div>
@endsection
