@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h1>Services Connecto</h1>
    <h2> uptime() </h2>
    <button type="button" class="btn"><a href="{{ route('admin.services.index') }}" >Accès admin Service</a></button>
    <button type="button" class="btn btn-warning" ><a href="{{route('home.reports.index')}}"> Signaler une panne</a> </button>
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
                        <td> <img src="{{ asset('image/{{$service->get_service_image($service->id)') }}"></td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif


@endsection