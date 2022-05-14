@extends('layouts.admin.app')

@section('title', 'Accueil')

@section('content')
    <div class="col-9">
        <h1>Service</h1>
        <hr>
        <a id="BtnCreateServ" class="btn btn-warning text-white margeLeftHautPage"
            href="{{ route('admin.services.create') }}">Ajouter un service </a>

        @if (session('logsuccess'))
            <p class="MessageSession">{{ session('logsuccess') }}</p>
        @endif
        <p class="MessageSession"> {{ session('NotSuper') }} </p>

        @if ($services->count() > 0)
            <table class="table">
                <thead>
                    <th>Nom du service</th>
                    <th>État</th>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td class="align-middle"> {{ $service->name }} </td>
                            <td> <img width="42px" height="42px"
                                    src="../image/{{ $service->get_service_image($service->id)->first()->image }}"
                                    alt="Icone de l\'etat du service {{ $service->get_service_image($service->id)->first()->image }}">
                            </td>
                            <td><button type="button" class="btn btn-warning"><a class="btn btn-link yellowButton"
                                        href="{{ route('admin.services.edit', ['service' => $service]) }}">Modifier
                                    </a></button> </td>
                            <td>
                                <form method="POST"
                                    action="{{ route('admin.services.destroy', ['service' => $service]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Supprimer" class="btn btn-danger text-white"
                                        onclick="return confirm('Êtes-vous certain de vouloir supprimer ce service?')" />
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p> Aucun produit à afficher pour le moment ! </p>
        @endif
    </div>
    </div>
@endsection
