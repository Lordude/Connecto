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
<div class="accordion" id="accordion">
    <div class="accordion-item">
<h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
Voir plus
        </button>
</h2>
<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <br/>
        <div class=""><strong>Commentaire: </strong> <br/>{{ $report->detail }}</div>
        <div class=""><strong>Date: </strong> <br/>{{ $report->date }}</div>
        <div class=""><strong>Problème courant: </strong> <br/>{{ $report->frequent_issue->problem}}</div>
</div>
    </div>
</div>
</div>

</td>

                    </tbody>
            </div>

    </div>

              

                @endforeach
@endsection

