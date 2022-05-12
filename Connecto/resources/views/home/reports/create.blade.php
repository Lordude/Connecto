@extends(session()->has('emailUser') ? 'layouts.admin.app' : 'layouts.app' )

@section('title', 'Signaler une panne')

@section('content')
<div class="col-9">
    <h3>Signalement</h3>

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
