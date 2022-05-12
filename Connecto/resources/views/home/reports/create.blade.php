@extends('layouts.app')

@section('title', 'Signaler une panne')

@section('content')
<div class="col-9">
    <div class="tableIncident">
    <h3 class="incidentTitle">Signalement</h3>

    <div class="row">

        <div class="col-6 col-lg-6">
            <form method="POST" action="{{ route('home.reports.store') }}">

                @csrf

                @include('home.reports.partials.form')

            </form>
        </div>
    </div>
    </div>
</div>
@endsection
