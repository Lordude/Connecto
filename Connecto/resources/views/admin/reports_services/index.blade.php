@include('layouts.admin.headerAdmin')

@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')


    <h1>Signalement</h1>


<div class="d-flex justify-content-between">  
<p style="background-color: #DDFDFC;">
    <?php echo App\Models\Report::reportOpenSinceOneHour() ?>

    signalement en 24 heure</p>
    </div>


        <table class="table">
                
            <div class="container">   
<tr>
<th>Nom service</th>
<th>En voir plus</th>
</tr>
</thead>
<tbody>

{{-- @foreach($data as $row)
<tr>
<td>{{ $row->service.name }}</td>
<td>{{ $row->report_service.detail }}</td>
</tr>
@endforeach --}}

{{-- @foreach ($reports as $report)
                        <tr>
<td><form method="POST" action="{{ route('home.reports.show', ['report' => $report]) }}" class="mb-0">
        @endforeach                        
        @foreach ($reports as $report) --}}

                    
{{-- <ul class="list-group">
<li class="list-group-item disabled text-danger"><input class="form-check-input me-1"
type="checkbox" id="report" name="reports[]"
value="{{ $report->id }}"><label for="service">{{ $report->name }}
</label></li>
</ul> --}}
                            

{{-- @endforeach  --}}




<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
Détail
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
        ...
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
</div>
    </div>
</div>
</div>

</form></td>

                        </tr>
                   
                </tbody>
            </table>



       
        

      

@endsection
