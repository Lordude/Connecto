@include('layouts.admin.headerAdmin')

@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')


<h1>Signalement</h1>


<tbody>
        <div>
<table class="table container-md">
                <thead>


                    <th>Service affecté</th>
                    <th>État</th>
                    <th>Commentaire</th>
                    <th>Date de création</th>
                   
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

                                {{-- <td>{{ $service->get_service_state($service->id)->first()->name }}</td> --}}
                               

                                {{-- <td>{{ $report->get_report_detail($report->id)->first()->detail }}</td> --}}
                                <td>{{ $report->created_at }}</td>
                             
                               
     

                            </tr>
                </tbody>
                {{-- @else --}}
                {{-- <p> Aucun services à afficher présentement </p> --}}
              
                @endforeach




















        



@endsection
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        détail du signalement
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>