@include('layouts.admin.headerAdmin')

@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')
<div class="col-9">
    <h1>Service</h1>
    <a href="{{route('home')}}">Accès home</a>
    <a href="{{route('admin.incidents.index')}}"> Gestion des incidents </a>
<hr/><a href="{{route('admin.reports_services.index')}}"> Gestion des signalements </a>
@if (session('logsuccess'))
        <p class="MessageSession">{{session('logsuccess')}}</p>
@endif
<p class="MessageSession"> {{ session('NotSuper') }} </p>
   
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
                            <td> <img width="42px" height="42px" src="../image/{{$service->get_service_image($service->id)->first()->image;}}" alt="Icone de l\'etat du service {{$service->get_service_image($service->id)->first()->image;}}"></td>
                            <td><a class="btn btn-link link-primary" href="{{route('admin.services.edit', ['service' => $service]) }}">Modifier </a> </td>
                            <td><form method="POST" action="{{ route('admin.services.destroy', ['service' => $service]) }}">
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

    <a class="btn btn-warning" href="{{ route('admin.services.create') }}">Ajouter un service </a>
    </div>
</div>
@endsection