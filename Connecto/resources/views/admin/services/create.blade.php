@include('layouts.admin.headerAdmin')

@extends('layouts.admin.app')

@section('title', 'Ajouter un service')

@section('content')

    <h1>Ajouter un service</h1>

    <form method="POST" action="{{ route('admin.services.store') }}">
        @csrf 

        <div>
            <label for="name" class="form-label">Nom du service</label>
            <input id="name" name="name" type="text" class="form-control">
        </div>


    <input type="submit" value="Enregistrer" class="btn btn-primary">
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary"> Retour </a>

    </form>
    
@endsection