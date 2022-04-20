@extends('layouts.home.app')

@section('title', 'Ajouter un signalement')

@section('content')
  <h1>Ajouter un signalement</h1>

  <div class="row">
    
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('home.reports.store') }}">
       
        @csrf

        @include('home.reports.partials.form')

      </form>
    </div>
  </div>
@endsection