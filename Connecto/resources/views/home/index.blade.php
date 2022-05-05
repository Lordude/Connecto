@include('home.HeaderPublic')

@extends('layouts.admin.app')

@section('title', 'Signaler une panne')

@section('content')

    <h1>Services Connecto</h1>
    <h2> uptime() </h2>
    <button type="button" class="btn"><a href="{{ route('admin.services.index') }}" >Accès admin Service</a></button>
    <button type="button" class="btn btn-warning" ><a href="{{route('home.reports.create')}}"> Signaler une panne</a> </button>
    <button type="button" class="btn btn-warning" ><a href="{{route('superadmin.users.index')}}"> USERS SUPER ADMIN</a> </button>
    @if($services->count() > 0)
        <table class="table">
            <thead>
                <th>Nom</th>
                <th>État</th>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->name}} </td>
                        <td>{{ $service->incident}}</td>
                        <td> {{ $service->get_service_state($service->id)->first()->name;}} </td>
                        <td> {{ $service->get_service_description($service->id)->first()->description;}} </td>
                        <td> <img width="42px" height="42px" src="./image/{{$service->get_service_image($service->id)->first()->image;}}" alt="Icone de l\'etat du service {{$service->get_service_image($service->id)->first()->image;}}"></td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif


@endsection