@extends('layouts.home.app')

@section('title', 'Ajouter un produit')

@section('content')
  <h1>Ajouter un produit</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('home.report.store') }}">
        @csrf

        @include('home.report.partials.form')

      </form>
    </div>
  </div>
@endsection