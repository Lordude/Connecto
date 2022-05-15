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
            <div class="reportHourAlignment">
                <h3 class="signalementTitle">Signalement</h3>
                <div class="reportPublicClock">
                    <?php
                    use Carbon\Carbon;
                    $cur_time_date = Carbon::now()->format('d/m/Y');
                    $cur_time_hour = Carbon::now()->format(' H:i');

                    echo "Nous sommes le $cur_time_date <br/> il est $cur_time_hour";
                    ?>
                    
                </div>
        </div>
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
