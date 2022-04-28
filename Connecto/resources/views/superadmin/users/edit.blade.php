@extends('layouts.superadmin.app')

@section('title', 'Ajouter un compte')

@section('content')

    <h1>Ajouter un compte utilisateur</h1>

    <form method="POST" action="{{ route('superadmin.users.store') }}">
        @csrf 

        <div>
            <label for="first_name" class="form-label">Prénom</label>
            <input id="first_name" name="first_name" type="text" class="form-control">

            <label for="last_name" class="form-label">Nom</label>
            <input id="last_name" name="last_name" type="text" class="form-control">

            <label for="email" class="form-label">Courriel</label>
            <input id="email" name="email" type="email" class="form-control">

            <label for="date_hired" class="form-label">Date d'embauche</label>
            <input id="date_hired" name="date_hired" type="date" value="{{Carbon::now()}}" class="form-control">

            @foreach($roles as $role) {
                <input type="radio" id="role_id" name="role_id" value="{{$role->id}}" class="form-control">
                <label for="role_id"> {{$role->name}} </label><br/>
            }

        </div>


    <input type="submit" value="Enregistrer" class="btn btn-primary">
    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary"> Retour </a>

    </form>
    
@endsection