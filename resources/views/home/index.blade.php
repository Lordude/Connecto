@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app')

@section('title', 'Bienvenu')

@section('content')
    <div class="col-md-9">
        <div class="row" style="margin:1em;">
            <div class="col-md-8">
                <h1 class=" titreBoutonAccueilRes">Services Connecto</h1>
            </div>
            <div class="col-md-4 titreBoutonAccueilRes">
                <button type="button" class="btn btn-warning text-white margeLeftHautPage"><a class="yellowButton"
                        href="{{ route('home.reports.create') }}"> Signaler une panne</a>
                </button>
            </div>
        </div>
        @if (app\Models\Incident::hasNoOpenIncident())
            <p class="mx-auto text-center bg-success p-2 text-dark bg-opacity-10 rounded-2 w-50"> Tous nos services sont
                opérationnels </p>
        @endif
        @if ($services->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="enteteTableauResponsive">
                        <th>Services</th>
                        <th></th>
                        <th>Statut</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr class="tableauAccueil">
                                <td class="serviceNameAccueilResponsive">{{ $service->name }} </td>
                                <td class="iconesServicesAccueil">{{ $service->incident }}</td>
                                <td class="iconesServicesAccueil"> <img width="42px" height="42px"
                                        src="./image/{{ $service->get_service_image($service->id)->first()->image }}"
                                        alt="Icone de l\'etat du service {{ $service->get_service_image($service->id)->first()->image }}">{{ $service->get_service_state($service->id)->first()->name }}
                                </td>
                                <td class=" descriptionTableauAccueil">
                                    {{ $service->get_service_description($service->id)->first()->description }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
