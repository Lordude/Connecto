


<div class="mb-3">
    <label for="name" class="form-label">Nom </label>
    <input id="name" name="name" type="text" value="" class="form-control 
   
    <label for="email" class="form-label"> email </label>
    <input id="email" name="email" type="text" value="" class="form-control ">
    

    
  </div>
  <label for="services">Service:</label>
<select name="services" id="services">
  <option value="choisir">Choisir</option>
    <option value="Applications mobiles (iOS et Android)">Applications mobiles (iOS et Android)</option>
    <option value="Caméra Connecto Cam">Caméra Connecto Cam</option>
    <option value="Thermostat Connecto Temp">Thermostat Connecto Temp</option>
    <option value="Ampoule Connecto Light">Ampoule Connecto Light</option>
    <option value="Prise électrique Connecto Power">Prise électrique Connecto Power</option>
    <option value="Sonnette Connecto Ring">Sonnette Connecto Ring</option>
    <option value="Serrure Connecto Lock">Serrure Connecto Lock</option>
    <option value="Flux vidéo Connecto Cam en temps réel">Flux vidéo Connecto Cam en temps réel</option>
    <option value="Historique vidéo Connecto Cam">Historique vidéo Connecto Cam</option>
    <option value="Alertes">Alertes</option>
    <option value="Tableau de bord Connecto Pro">Tableau de bord Connecto Pro</option>
 
 
</select>

<label for="date">La date du moment que l"incident à commencé:</label>
<select name="date" id="dates">
    <option value="choisir">Choisir une date</option>
  <option value="dave">Dave</option>
  <option value="pumpernickel">Pumpernickel</option>
  <option value="reeses">Reeses</option>
</select>

              <div class="mb-3">
                <label for="détail" class="form-label"><strong>Détails supplémentaires</strong></label>
                <H6> Nous décrire brievement l'évènement </H6>
                <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $report->detail) }}</textarea>
              
                @error('detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
        
      


