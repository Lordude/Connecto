@extends('layouts.admin.app')

@section('title', 'Modifier un statut')

@section('content')
    <div class="col-md-9">
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
                            <input type="submit" class="btn-close" value="" aria-label="Close" onclick="return confirm
                                            ('êtes-vous sûr de vouloir remettre ce service opérationnel? Il sera alors retiré de l\'incident en cours')" />
                        </form>
                    </button>
                @endif
                <ul class="list-group list-group-flush editServiceStatus">
                    <li class="list-group-item">{{ $service->name }}</li>
                </ul>
            </div>
        @endforeach
        <div class="flexEditForm">
            <p class="text-info">Statut actuel :
                {{ $incident->state->name }}
            </p>
            <hr />
            <form class="editFormStatus" method="POST"
                action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
                @csrf
                @method('PUT')
                <label for="name" class="form-label">Modifier l'état à :</label>
                <select class="form-select editState1 " name="state" id="states">
                    <option value="{{ $incident->state_id }}" selected="selected">
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
                <input class="editState2 commentary" type="textarea" id="commentary" name="commentary" size="50px" maxlength="50"
                    value="{{ $incident->commentary }}">
                <div>
                    <br />
                    <hr />
                     <label for="date" class="text-danger">Attention: Ce champs est fait uniquement pour modifier la date et l'heure du <strong>début</strong> de l'incident</label>
                    <?php
                    use Carbon\Carbon;
                    ?>

                    <div class=" date" data-provide="datepicker">
                        <input id="start_date" name="start_date" type="datetime-local" class="form-control"
                            max="{{ Carbon::now()->format('Y-m-d\TH:i') }}" value="{{ $incident->start_date->format('Y-m-d\TH:i') }}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
        </div>
        <div class="editFormButton">
            <input type="submit" value="Enregistrer" class="btn btn-warning text-white">
            <a href="{{ route('admin.incidents.index') }}" class="btn text-danger"> Retour </a>
        </div>
        <br />

        </form>
    </div>
    </div>
    </div>
@endsection
