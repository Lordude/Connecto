@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app' )

@section('title', 'Signaler une panne')

@section('content')

 

 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-9">
    <div class="tableSignalement">
    <h3 class="signalementTitle">Signalement</h3>

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
