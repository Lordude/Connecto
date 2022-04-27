@extends('layouts.superadmin.app')

@section('title', 'Accueil')

@section('content')
    <h1>Service</h1>
    <a href="#" class="nav navbar-nav navbar-left">Accès home</a>

    @if (session('logsuccess'))
            <div class="alert alert-sucess">
                {{session('logsuccess')}}
            </div>
    @endif
   
        @if($users->count() > 0)
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Date d'embauche</th>
                    <th>Mot de passe</th>
                    <th>Accès</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{$user->first_name}} {{$user->last_name}} </td>
                            <td> {{$user->email}}</td>
                            <td> {{$user->date_hired}}</td>
                            <td> {{$user->password}}</td>
                            <td> {{$user->role_id}}</td>
                            <td><a href="#">Modifier </a> </td>
                            <td><form method="POST" action="" class="mb-0">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Supprimer" class="btn btn-link link-danger" onclick="return confirm('Are you sure?')" />
                              </form></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p> Aucun produit à afficher pour le moment ! </p>
        @endif

    <a href="{{ route('admin.services.create') }}">Ajouter un service </a>

@endsection