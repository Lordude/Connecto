@extends('layouts.app')

@section('title', 'Signaler une panne')

@section('content')
<div class="col-9">

    <h1>Signaler une panne</h1>

    <p> Votre système epprouve des difficultés remplissez ce formualaire et on vous aidera ! </p>

    <a href="{{ route('home.reports.create') }}">Formulaire </a>
    </div>
</div>
@endsection
