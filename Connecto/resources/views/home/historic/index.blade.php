@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app')

@section('title', 'Historique')

@section('content')
    <div class="col-md-9">

        <h1 class="titreHistoric">Historique de disponibilité</h1>
        <hr>

        @if ($incidents->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class="enteteTableauResponsive">
                        <th>Date de début</th>
                        <th>Date de fin </th>
                        <th>Durée</th>
                        {{-- <th>Commentaire</th> --}}
                        <th>Incident(s) affecté(s)
                        <th>
                    </thead>
                    <tbody>
                        @foreach ($incidents as $incident)
                            <tr class="ligneHistoricResponsive">
                                <td class="bordure tdHistoric"><span class="ref4">{{ $incident->start_date }}</span></td>
                                <td class="tdHistoric">
                                    @if (!$incident->end_date)
                                        En cours
                                    @else
                                        <span class="ref5">{{ $incident->end_date }}</span>
                                    @endif
                                </td>
                                <td class="tdHistoric">
                                    @if ($incident->incidentLengthInHour() < 1)
                                        <span class="ref2"> Moins de 1 heure </span>
                                    @else
                                        <span class="ref2"> {{ $incident->incidentLengthInHour() }} heure(s)</span>
                                    @endif
                                </td>
                                {{-- @if ($incident->commentary == null)
                                    <td class="tdHistoric">{{ $incident->commentary }} </td>
                                @else
                                    <td class="tdHistoric"><span class="ref3">{{ $incident->commentary }}</span></td>
                                @endif --}}
                                <td class="tdHistoric">
                                    @foreach ($incident->services as $service)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item tableauAccueil serviceNameAccueilResponsive "><span
                                                    class="ref">{{ $service->name }}</span></li>
                                        </ul>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
