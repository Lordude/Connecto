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


<td>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
<h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
Voir plus
        </button>
</h2>
<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <br/>
        <div class=""><strong>Commentaire: </strong> <br/>{{ $report->detail }}</div>
        <div class=""><strong>Date: </strong> <br/>{{ $report->date }}</div>
        <div class=""><strong>Problème courant: </strong> <br/>{{ $report->frequent_issue->problem}}</div>
</div>
    </div>
</td>

                    </tbody>
            </div>

    </div>

                {{-- @else --}}
                {{-- <p> Aucun services à afficher présentement </p> --}}

                @endforeach
@endsection

