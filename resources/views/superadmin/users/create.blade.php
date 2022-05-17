@extends('layouts.admin.app')

@section('title', 'Ajouter un compte')

@section('content')
<div class="col-md-9">

    <h1>Ajouter un compte utilisateur</h1>
    <hr>

    <form method="POST" action="{{ route('superadmin.users.store') }}">
        @csrf


        <div>
            <label for="first_name" class="form-label">Prénom</label>
            <input id="first_name" name="first_name" type="text" class="form-control">

            <label for="last_name" class="form-label">Nom</label>
            <input id="last_name" name="last_name" type="text" class="form-control">

            <label for="email" class="form-label">Courriel</label>
            <input id="email" name="email" type="email" class="form-control">

            <label for="password" class="form-label">Mot de passe :</label>
            <input id="password" name="password" type="password" class="form-control">

            <label for="date_hired" class="form-label">Date d'embauche</label>
            <input id="date_hired" name="date_hired" type="date" value="" class="form-control">

            <label for="role_id" class="form-label">Accès rôle</label> </br>
                <select id="role_id" name="role_id">
                    <option value="1">Administrateur</option>
                    <option value="2">Superadministrateur</option>
                </select>
        </div>
        </br>


    <input type="submit" value="Enregistrer" class="btn btn-primary">
    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary"> Retour </a>

    </form>
    </div>
    
@endsection