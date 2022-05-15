@extends('layouts.admin.app')

@section('title', 'Ajouter un compte')

@section('content')
<div class="col-md-9">

    <h1>Modifier un compte utilisateur</h1>
    <hr>

    <form method="POST" action="{{ route('superadmin.users.update', ['user' => $user])}}">
        @csrf 
        @method('PUT')

        <div>
            <label for="first_name" class="form-label">Prénom</label>
            <input id="first_name" name="first_name" value="{{ $user->first_name }}" type="text" class="form-control">

            <label for="last_name" class="form-label">Nom</label>
            <input id="last_name" name="last_name" value="{{ $user->last_name }}" type="text" class="form-control">

            <label for="email" class="form-label">Courriel</label>
            <input id="email" name="email" value="{{ $user->email }}" type="email" class="form-control">

            <label for="role_id" class="form-label">Accès administrateur</label>
            <input id="role_id" name="role_id" type="number" class="form-control">

        </div>


    <input type="submit" value="Enregistrer" class="btn btn-primary">
    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary"> Retour </a>

    </form>
    </div>

    
@endsection