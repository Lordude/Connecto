@extends('layouts.admin.app')

@section('title', 'Ajouter un produit')

@section('content')
  <h1>Ajouter un produit</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('admin.report.store') }}">
        @csrf

        @include('admin.report.partials.form')

      </form>
    </div>
  </div>
@endsection