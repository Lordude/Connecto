@extends('layouts.admin.app')

@section('title', 'Signalement')

@section('content')


<div class="col-9">

    <h1>Signalement</h1>


    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
            <div class="tableIncident">
                <h3 class="incidentTitle">Service affecté</h3>
                <hr />
                <div class="mb-3 container p-2">
                  
                    <div class="incidentForm">

                        @foreach ($reports as $report)
                        
                        @foreach ($report->services as $service)
                       
                        <ul class="list-group incidentServicesForm">
                       <div class="accordion" id="accordion">
                           <div class="reportForm3">
                       <h2 class="accordion-header" id="headingOne">
                               <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                       Voir plus
                               </button>
                               
                               <ul class="list-group reportServicesForm">
                       </h2>
                       <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <br/>
                           <div class="mb-3">
                            
                               <div class="pourtour"><strong>Commentaire: </strong> <br/>{{ $report->detail }}</div>
                               <div  class="pourtour"><a href="mailto:<strong>Courriel de l'expéditeur(trice)</strong> <br/> {{ $report->email }}">{{ $report->email }}</a></div>
                               <div class="pourtour"><strong>Date: </strong> <br/>{{ $report->date }}</div>
                               <div class="pourtour"><strong>Problème courant: </strong> <br/>{{ $report->frequent_issue->problem}}</div>
                          

                        
                       </div>
                    </div>
                </div>
                                </ul>
                             
                          
                            @endforeach
                            @endforeach
                        @endsection