@extends('layouts.app')

@section('title', 'Signaler une panne')

@section('content')

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
