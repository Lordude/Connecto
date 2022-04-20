@extends('layouts.admin.app')

@section('title', 'Signalement')

@section('content')
  <h1>Signalement</h1>

  <div class="row">
    
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('home.reports.store') }}">
       
        @csrf

        @include('home.reports.partials.form')

      </form>
    </div>
  </div>
@endsection