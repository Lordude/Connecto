@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')
    <h1>Service</h1>
    <a href="#" class="nav navbar-nav navbar-left">Accès home</a>
    <a href="{{route('admin.incidents.index')}}"> Gestion des incidents </a>
    <a href="{{route('admin.reports_services.index')}}"> Gestion des signalements </a>
    @if (session('logsuccess'))
            <div class="alert alert-sucess">
                {{session('logsuccess')}}
            </div>
    @endif
   
        @if($services->count() > 0)
            <table class="table">
                <thead>
                    <th>Nom du service</th>
                    <th>État</th>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td> {{$service->name}} </td>
                            <td><a href="{{route('admin.services.edit', ['service' => $service]) }}">Modifier </a> </td>
                            <td><form method="POST" action="{{ route('admin.services.destroy', ['service' => $service]) }}" class="mb-0">
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