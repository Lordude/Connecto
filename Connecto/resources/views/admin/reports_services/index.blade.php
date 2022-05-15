@extends('layouts.admin.app')

@section('title', 'Signalement')

@section('content')
<div class="col-9">


    
        <h1>Signalement</h1>
        <hr />
        <div>
            <form>
        <div class="tableReport">
            <thead>
<h5>Service affecté</h5>


<div class="mb-3 container p-2">

<div class="reportFForm">

    @foreach ($reports as $report)
                        
 @foreach ($report->services as $service)

<ul class="list-group-item">{{ $service->name }}

        
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
        <div> <a href="mailto:<strong>Courriel de l'expéditeur(trice)</strong> <br/> {{ $report->email }}">{{ $report->email }}</a></div>
        <div class=""><strong>Date: </strong> <br/>{{ $report->date }}</div>
        <div class=""><strong>Problème courant: </strong> <br/>{{ $report->frequent_issue->problem}}</div>

</form>
                        </div>
                     </div>
                </div>
            </div>         
        </div>

    </div>
</ul>
    @endforeach
    @endforeach
@endsection

