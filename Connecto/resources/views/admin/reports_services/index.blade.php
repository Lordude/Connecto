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
        @else
            <p> Aucun produit à afficher pour le moment ! </p>
        @endif

    
@endsection