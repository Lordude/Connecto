



    <hr />
    <div class="mb-3">
      <label for="name" class="form-label">Nom </label>
      <input id="name" name="name" type="text" value="" class="form-control 
     
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
        <div class="mb-3">

        </hr>
          <label for="détail" class="form-label"><strong>Détails supplémentaires</strong></label>
         
          <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $report->detail) }}</textarea>
        
          @error('detail')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
       
        <input type="submit" value="Envoyer" class="btn btn-primary">
        <a href="{{ route('home.reports.index') }}" class="btn btn-secondary">Annuler</a>
</form>

</select>

             
             

      


