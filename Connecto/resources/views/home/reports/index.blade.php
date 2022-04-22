@extends('layouts.admin.app')

@section('title', 'Signaler une panne')

@section('content')


    <h1>Signaler une panne</h1>


      

            <p> Votre système epprouve des difficultés remplissez ce formualaire et on vous aidera ! </p>
       

    <a href="{{ route('home.reports.create') }}">Formulaire </a>

@endsection