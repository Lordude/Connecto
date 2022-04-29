<div class="col6 col-lg-6">
    <form method="POST" action="{{ route('home.reports.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom </label>
            <input id="name" name="name" type="text" value="" class="form-control">

      <label for="email" class="form-label"> email </label>
            <input id="email" name="email" type="text" value="" class="form-control ">

            <label for="services">Service affecté :</label>
            <select name="report" id="reports">
                <option value="" selected="selected" disabled>choisir</option>


                <?php
        use App\Models\Service;
        $services = Service::all();
        foreach ($services as $service){ ?>
                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                <?php } ?>
            </select>
            <label for="frequent_issues">Type de problème :</label>
            <select name="frequent_issue_id" id="frequent_issues">
                <option value="frequent_issues" selected="selected" disabled>choisir</option>
                <?php
        use App\Models\FrequentIssue;
        $frequent_issues = FrequentIssue::all();{ ?>


                @foreach ($frequent_issues as $frequent_issue)
                    <option value="{{ $frequent_issue->id }}"><label
                            for="frequent_issues">{{ $frequent_issue->problem }}</label></option>
                @endforeach
                <?php } ?>
            </select>

            <input type="hidden" value="1" name="frequent_issues_id" id="frequent_issues_id">

            <div class="mb-3">

                <hr />
                <label for="report" class="form-label"><strong>Détails supplémentaires</strong></label>

                <textarea id="report" name="detail"
                class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $report->detail) }}</textarea>

                @error('report')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <input type="date" id="date" name="date">

            <input type="submit" value="Envoyer" class="btn btn-primary">
            <a href="{{ route('home.reports.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

    </select>
