@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app' )

@section('title', 'Bienvenu')

@section('content')
<div class="col-9">

    <h1>Services Connecto</h1>
    <hr>
    <button type="button" class="btn btn-warning" ><a href="{{route('home.reports.create')}}"> Signaler une panne</a> </button>
    @if($services->count() > 0)
    {{-- @if($services->hasOpenIncident() == 0)
    <p class="bg-success p-2 text-dark bg-opacity-10 rounded-2"> Tous nos services sont opérationnels </p>
    @endif --}}
        <table class="table">
            <thead>
                <th>Services</th>
                <th></th>
                <th>Statut</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->name}} </td>
                        <td>{{ $service->incident}}</td>
                        <td> <img width="42px" height="42px" src="./image/{{$service->get_service_image($service->id)->first()->image;}}" alt="Icone de l\'etat du service {{$service->get_service_image($service->id)->first()->image;}}">{{ $service->get_service_state($service->id)->first()->name;}}</td>
                        <td> {{ $service->get_service_description($service->id)->first()->description;}} </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> Aucun services à afficher présentement </p>
    @endif
    </div>
</div>


@endsection
