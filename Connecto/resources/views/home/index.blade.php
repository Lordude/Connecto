@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h1>Services Connecto</h1>
    <a href="{{ route('admin.services.index') }}" class="nav navbar-nav navbar-left">Accès admin Service</a>
    <a href="{{route('home.reports.index')}}" class="nav navbar-nav navbar-left">Signalement </a>

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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif


@endsection