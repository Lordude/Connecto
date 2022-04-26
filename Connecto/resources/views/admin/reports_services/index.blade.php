@extends('layouts.admin.app')

@section('title', 'Reports_Services')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

    <h2>Gestion des signalements</h2>


                       
    {{-- vue des signalements en cours --}}
    <tbody>
        <div>
            <table class="table container-md">
                <thead>
                    <h2>Signalements</h2>

                    <th>Service affecté</th>
                    <th>Report</th>
                    <th></th>
                    <th>Description</th>
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
                                <td>{{ $service->get_service_state($service->id)->first()->name }}</td>
                                <td><img src="{{ asset('image/') . $service->get_service_image($service->id) }}"
                                        alt="icone" /></td>
                                {{-- <td><img src="{{ asset('image/ {$service->get_service_image($service->id}' )}}" alt="icone"/></td> --}}
                                </td>

                            </tr>
                </tbody>
               
              
                @endforeach
            </table>
        @endsection
