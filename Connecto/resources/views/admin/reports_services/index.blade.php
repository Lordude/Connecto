@extends('layouts.admin.app')

@section('title', 'Signalement')

@section('content')





<div class="col-md-9">
    <div class="tableSignalement">

        <div class="reportHourAlignment">
            <h1>Signalement</h1>
<br />
            <div class="reportPublicClock">
                <?php
                use Carbon\Carbon;
                $cur_time_date = Carbon::now()->format('d/m/Y');
                $cur_time_hour = Carbon::now()->format(' H:i');

                echo "Nous sommes le $cur_time_date <br/> il est $cur_time_hour";
                ?>
            </div>
        </div>
    </div>
    <table class="table container-md">
        <table class="table">
            <thead>

            </thead>
            <tbody>


                <div class="tableIncident">
                    <h3 class="serviceAffecteTitle">Service affecté</h3>

                    <div class="mb-3 container p-2">

                        <div class="incidentForm">

                            @foreach ($reports as $report)
                                @foreach ($report->services as $service)

                            <ul class="list-group incidentServicesForm">
                                <div class="accordion" id="accordion" >
                                    <div class="reportForm3" >
                                        <h2 class="accordion-header" id="heading{{$service->id}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$service->id}}" aria-expanded="false" aria-controls="collapse{{$service->id}}">
                                            <label for="service_{{ $service->id }}">{{ $service->name }}</label>
                                            </button>
                                            <ul class="list-group reportServicesForm">
                                        </h2>
                                        <div id="collapse{{$service->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$service->id}}" data-bs-parent="#accordionExample">
                                            <br/>
                                            <div class="mb-3">

                                                <div class=""><strong>Commentaire: </strong> <br/>{{ $report->detail }}</div>
                                                <div class=""><a href="mailto:<strong>Courriel de l'expéditeur(trice)</strong> <br/> {{ $report->email }}">{{ $report->email }}</a></div>
                                                <div class=""><strong>Date: </strong> <br/>{{ $report->date }}</div>
                                                <div class=""><strong>Problème courant: </strong> <br/>{{ $report->frequent_issue->problem}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </ul>
                        </ul>            
                                    
                                @endforeach
                                @endforeach
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </table>


                        @endsection
