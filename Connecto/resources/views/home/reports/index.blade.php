@extends('layouts.admin.app')

@section('title', 'Signaler une panne')

@section('content')

    <h1>Signaler une panne</h1>


        @if($reports->count() > 0)
            <table class="table">
                <thead>
                    <th>Nom du service</th>
                    <th>État</th>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td> {{$service->name}} </td>
                            <td><a href="{{route('home.report.edit', ['report' => $report]) }}">Modifier </a> </td>
                            <td><form method="POST" action="{{ route('home.report.destroy', ['report' => $report]) }}" class="mb-0">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Supprimer" class="btn btn-link link-danger" onclick="return confirm('Are you sure?')" />
                              </form></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p> Clic au besoin ! </p>
        @endif

    <a href="{{ route('home.reports.create') }}">Signaler une panne </a>

@endsection