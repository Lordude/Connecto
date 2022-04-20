
<div class="mb-3">
    <label for="name" class="form-label">Nom </label>
    <input id="name" name="name" type="text" value="name" class="form-control 
   
    <label for="name" class="form-label">Nom </label>
    <input id="name" name="name" type="text" value="name" class="form-control ">
  
   
  </div>
  
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">services</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">incidents</button>
    <div id="myDropdown" class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>

              <div class="mb-3">
                <label for="détail" class="form-label">Détails supplémentaires</label>
                <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $report->detail) }}</textarea>
              
                @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
             