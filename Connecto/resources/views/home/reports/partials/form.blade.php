<div class="col6 col-lg-6">
    <form method="POST" action="{{ route('home.reports.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom </label>
            <input id="name" name="name" type="text" value="" class="form-control">

      <label for="email" class="form-label"> email </label>
            <input id="email" name="email" type="text" value="" class="form-control ">

            <label for="services">service</label>
            <select name="report" id="reports">
                <option value="" selected="selected" disabled>choisir</option>


                <?php
        use App\Models\Service;
        $services = Service::all();
        foreach ($services as $service){ ?>
                <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                <?php } ?>
            </select>

            <input type="hidden" value="1" name="frequent_issues_id" id="frequent_issues_id">


            {{-- <select name="problem" id="problems">
                <option value="" selected="selected" disabled>choisir</option>
                @foreach ($frequent_issues as $frequent_issues)
                    <option value="{{ $frequent_issue->id }}"><label
                            for="problem">{{ $frequent_issue->problem }}</label></option>
                @endforeach
            </select> --}}

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

            <input type="submit" value="Envoyer" class="btn btn-primary">
            <a href="{{ route('home.reports.index') }}" class="btn btn-secondary">Annuler</a>
    </form>

    </select>
