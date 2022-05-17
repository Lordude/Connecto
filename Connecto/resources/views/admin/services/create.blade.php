@extends('layouts.admin.app')

@section('title', 'Ajouter un service')

@section('content')
    <div class="col-md-9">

        <h1>Ajouter un service</h1>
        <hr>

        <form method="POST" action="{{ route('admin.services.store') }}">
            @csrf

            <div class="editFormStatus flexEditForm">
                <label for="name" class="form-label">Nom du service</label>
                <input id="name" name="name" type="text" class="form-control">
            </div>
            <br />
            <div class="editFormButton">
                <input type="submit" value="Enregistrer" class="btn btn-warning text-white">
                <a href="{{ route('admin.services.index') }}" class="btn text-danger"> Retour </a>
            </div>
        </form>
    </div>
@endsection
