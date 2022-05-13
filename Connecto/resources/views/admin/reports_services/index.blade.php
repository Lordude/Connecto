@extends('layouts.admin.app')

@section('title', 'Signalement')

@section('content')
    <div class="col-9">

        <h1>Signalement</h1>
        <hr>

        <tbody>
            <div>
                <table class="table container-md">
                    <thead>

                        <th>Service affecté</th>
                        <th>courriel</th>
                        <th>Commentaire</th>
                        <th>Type de problème</th>
                        <th>Date</th>

                    </thead>
                    <tbody>

                        @foreach ($reports as $report)
                            <tr>
                                <td>
                                    @foreach ($report->services as $service)
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{ $service->name }}</li>
                                        </ul>
                                    @endforeach
                                </td>

                                <td> <a href="mailto:{{ $report->email }}">{{ $report->email }}</a></td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#signalement_{{ $report->id }}">
                                        Détails
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="signalement_{{ $report->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="Commentaire" id="staticBackdropLabel">Commentaire</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">{{ $report->detail }}</div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fermer</button>
                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
    data-bs-target="#signalement__{{ $report->id }}">
    Type
</button>

<!-- Modal -->
<div class="modal fade" id="signalement__{{ $report->id }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="Type de problème" id="staticBackdrop">Type de problème</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=""> {{ $report->frequent_issue->problem}}</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Fermer</button>
         
            </div>
        </div>
    </div>
</div>













                             

                                </td>
                                <td>{{ $report->created_at }}</td>

                            </tr>
                    </tbody>
            </div>

    </div>

                {{-- @else --}}
                {{-- <p> Aucun services à afficher présentement </p> --}}

                @endforeach
@endsection

