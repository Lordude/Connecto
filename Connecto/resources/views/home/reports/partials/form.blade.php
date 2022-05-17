    <hr/>
    <form class="GeneralForm" method="POST" action="{{ route('home.reports.store') }}">
        @csrf

    <div class="row reportFormPublic1">
            <div class="col-xl-5 col-lg-6 col-md-5 col-sm-5 col-xs-3">
                <label for="name" class="form-label-report" >Nom * : </label>
                <input placeholder="ex: Mr Patate" class="option" id="name" name="name" type="text" value="" class="form-control">
            </div>
            <div class="col-xl-5 col-lg-6 col-md-5 col-sm-5 col-xs-3">
                <label for="email" class="form-label-report"> Courriel * : </label>
                <input placeholder="ex: nobody@google.com" class="option" id="email" name="email" type="text" value="" class="form-control ">
            </div>
        </div>
    <hr/>
            <label for="services">Service affecté * :</label>
            <select class="form-select form-select-sm" name="services" id="services">
                <option value="" selected="selected" disabled>choisir</option>

                <?php
        use App\Models\Service;
        $services = Service::all();
        foreach ($services as $service){ ?>
                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                <?php } ?>
            </select>
        <br />
        <br />
        <div>

            <label for="frequent_issues">Type de problème * :</label>
            <select class="form-select form-select-sm" name="frequent_issue_id" id="frequent_issues">
                <option value="frequent_issues" selected="selected" disabled>choisir</option>
                <?php
        use App\Models\FrequentIssue;
        $frequent_issues = FrequentIssue::all();{ ?>

                @foreach ($frequent_issues as $frequent_issue)
                    <option class="choix" value="{{ $frequent_issue->id }}"><label
                            for="frequent_issues">{{ $frequent_issue->problem }}</label></option>
                @endforeach
                <?php } ?>
            </select>

            {{-- <input type="hidden" value="1" name="frequent_issues_id" id="frequent_issues_id"> --}}
            <div class="mb-3">
                <hr />
                <label for="report" class="form-label">Détails supplémentaires *</label>
            </br>
            <div>
                <textarea class="option" id="report" name="detail"
                    class="form-control @error('detail') is-invalid @enderror">{{old('detail', $report->detail)}}</textarea>

                @error('report')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <hr />
            <div class="reportFormPublic2">
            <p>Pour mieux vous aider, veuillez nous spécifier la date de début de l'incident.*</p>
            <?php
            use Carbon\Carbon;
            ?>
            <input class="option" type="date" id="date" name="date" max="{{ Carbon::now()->format('Y-m-d') }}">
            </div>
            <hr />
            <input type="submit" value="Envoyer" class="btn btn-warning text-white">
            <a href="{{ route('home.reports.create') }}" class="btn text-danger">Recommencer</a>
        </div>
    </form>



