@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')

    <h1>Signalement</h1>



        @if($services->count() > 0)
            <table class="table">
                <p>nombre de signalements par heure</p>
                <input type="submit" value="signalement/heure" class="btn btn-link link-danger" onclick="return confirm('Are you sure?')" />
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

                                <input type="submit" value="detail" class="btn btn-link link-danger" onclick="return confirm('Are you sure?')" />
                              </form></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="report_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  


        @else
            <p> Aucun produit à afficher pour le moment ! </p>
        @endif


@endsection
