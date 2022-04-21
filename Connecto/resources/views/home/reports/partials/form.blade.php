


<div class="mb-3">
    <label for="name" class="form-label">Nom </label>
    <input id="name" name="name" type="text" value="" class="form-control 
   
    <label for="courriel" class="form-label"> Courriel </label>
    <input id="courriel" name="courriel" type="text" value="" class="form-control ">
    
 
    
  </div>
  <label for="services">Service:</label>
<select name="services" id="services">
    <option value="rigatoni">Choisir</option>
  <option value="dave">Dave</option>
  <option value="pumpernickel">Pumpernickel</option>
  <option value="reeses">Reeses</option>
</select>

<label for="incident">Incident:</label>
<select name="incident" id="incident">
    <option value="rigatoni">Choisir</option>
  <option value="dave">Dave</option>
  <option value="pumpernickel">Pumpernickel</option>
  <option value="reeses">Reeses</option>
</select>



              <div class="mb-3">
                <label for="détail" class="form-label">Détails supplémentaires</label>
                <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $report->detail) }}</textarea>
              
                @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
        
      