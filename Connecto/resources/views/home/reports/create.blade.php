@extends('layouts.admin.incidents.app')

@section('title', 'Reports')

@section('content')

    <h1><img style="width: 200px" src="{{ asset('image/RectangleText.png') }}"></h1>

  <h3>Signalement</h3>

  <div class="row">
    
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('home.reports.store') }}">
       
        @csrf

        @include('home.reports.partials.form')

      </form>
    </div>
  </div>
@endsection