@extends('layouts.admin.app')

@section('title', 'Gestion des administrateurs')

@section('content')
<div class="col-9">

    <h1>Gestion des administrateurs</h1>
    <hr>
    <a href="#" class="nav navbar-nav navbar-left">Accès home</a>

    @if (session('logsuccess'))
            <div class="alert alert-sucess">
                {{session('logsuccess')}}
            </div>
    @endif
       <a href="{{ route('superadmin.users.create') }}">Ajouter un compte </a>
        @if($users->count() > 0)
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Date d'embauche</th>
                    <!-- <th>Mot de passe</th> -->
                    <th>Accès</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{$user->first_name}} {{$user->last_name}} </td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->date_hired}}</td>
                            <!-- <td> {{$user->password}}</td> -->
                            <td> {{$user->role_id}}</td>
                            <td><a href="{{route('superadmin.users.edit', ['user' => $user])}}">Modifier </a> </td>
                            <td><form method="POST" action="{{route('superadmin.users.destroy', ['user' => $user])}}" class="mb-0">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Supprimer" class="btn btn-link link-danger" onclick="return confirm('Are you sure?')" />
                              </form></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        @else
            <p> Il n'y a presentement pas de compte utilisateur ! *bruit de X-files parce qu'il faut etre utilisateur pour voir cet ecran * </p>
        @endif



@endsection