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
                            <input type="submit" class="btn-close" value="" aria-label="Close" onclick="return confirm
                                    ('êtes-vous sûr de vouloir remettre ce service opérationnel? Il sera alors retiré de l\'incident en cours')
    " />
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
            {{-- <img width="42px" height="42px"
            src="../image/{{ $incident->state->image }}"
            alt="Icone de l\'etat du service {{ $incident->state->image }}"> --}}
            <hr />
            <form class="editFormStatus" method="POST"
                action="{{ route('admin.incidents.update', ['incident' => $incident]) }}">
                @csrf
                @method('PUT')
                <label for="name" class="form-label">Modifier l'état à :</label>
                <select class="form-select editState " name="state" id="states">

                    <option value="{{$incident->state_id}}" selected="selected">
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
                <input class="editState commentary" type="text" id="commentary" name="commentary" size="50px" maxlength="500"
                    value="{{ $incident->commentary }}">
                <div>
                    <br />
                    <hr/>
                    {{-- <label for="date" class="text-danger">Attention: Ce champs est pour modifier la date et l'heure du <strong>début</strong> de l'incident</label>
                    <?php
                    use Carbon\Carbon;
                    ?>

                    <div class=" date" data-provide="datepicker">
                        <input id="start_date" name="start_date" type="datetime-local" class="form-control"
                            max="{{ Carbon::now()->format('Y-m-d\TH:i:s') }}" value="{{ $incident->start_date }}">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div> --}}
                </div>
        </div>
        <div class="editFormButton">
            <input type="submit" value="Enregistrer" class="btn btn-warning text-white" onclick="return confirm
            ('Êtes-vous sûr de vouloir faire ces modifications?')
">
            <a href="{{ route('admin.incidents.index') }}" class="btn text-danger"> Retour </a>
        </div>
        <br/>
        <button type="button" class="btn btn-danger text-white editStatusDeleteButton">
            <form method="POST"
                action="{{ route('admin.services.deleteServiceFromIncidentService', $service->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Supprimer" class="btn btn-danger text-white editStatusDeletetextButton" onclick="return confirm('êtes-vous sûr de vouloir supprimer cet incident? Il sera complétement effacé de l\'historique. Si vous n\'êtes pas certain, demandez à un superviseur.')"/>
            </form>
        </button>
        </form>
    </div>
    </div>
@endsection
