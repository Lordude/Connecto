@include('layouts.admin.headerAdmin')

@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')





<div class="col-9">
    <h1>Signalement</h1>



      <div class="d-flex justify-content-between">  
        <p style="background-color: #DDFDFC;"><?php echo App\Models\Report::reportOpenSinceOneHour(); ?>  signalement en 24 heure</p>
       
   
    </div>
              




  
        @if($services->count() > 0)
            <table class="table">
                
             





                <thead>
                    <th>Nom du service</th>
                  
                   

                  

                 

                    
            
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td> {{$service->name}} </td>

                            <td><form method="POST" action="{{ route('admin.services.destroy', ['service' => $service]) }}" class="mb-0">
                                @csrf
                                @method('DELETE')
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
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>


        @else
            <p> Aucun produit à afficher pour le moment ! </p>
        @endif


@endsection
