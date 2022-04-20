
<div class="mb-3">
    <label for="name" class="form-label">Nom </label>
    <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
  
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  
 
  
  <div class="mb-3">
    <label for="appareil" class="form-label">Appareil</label>
    @foreach($appareils as $appareil)
      <div class="form-check">
        <input id="category_{{ $appareil->id }}" class="form-check-input" type="checkbox" name="appareils[]" value="{{ $appareil->id }}"
       
            @if (is_array(old('appareils', $selected_appareils)) && in_array($appareil->id, old('appareils', $selected_appareils)))
              checked
            @endif
        >
        <label class="form-check-label" for="appareil_{{ $appareil->id }}">
          {{ $appareil->name }}
        </label>
      </div>

      <div class="mb-3">
        <label for="appareil" class="form-label">Appareil</label>
        @foreach($appareils as $appareil)
          <div class="form-check">
            <input id="category_{{ $appareil->id }}" class="form-check-input" type="checkbox" name="appareils[]" value="{{ $appareil->id }}"
               
                @if (is_array(old('appareils', $selected_appareils)) && in_array($appareil->id, old('appareils', $selected_appareils)))
                  checked
                @endif
            >
            <label class="form-check-label" for="appareil_{{ $appareil->id }}">
              {{ $appareil->name }}
            </label>
          </div>

          <div class="mb-3">
            <label for="appareil" class="form-label">Appareil</label>
            @foreach($appareils as $appareil)
              <div class="form-check">
                <input id="category_{{ $appareil->id }}" class="form-check-input" type="checkbox" name="appareils[]" value="{{ $appareil->id }}"
                    {{--  En édition, 'old' contient la référence à la liste précédente s'il y a une erreur dans le formulaire
                    lors de l'envoi. Sinon, $selected_categories est la valeur par défaut. Cette dernière est initialisée dans le contrôleur à un Array vide pour 'create' (nouveau produit) et Array contenant les id des catégories 
                    sélectionnées à l'origine pour 'edit' --}}
                    @if (is_array(old('appareils', $selected_appareils)) && in_array($appareil->id, old('appareils', $selected_appareils)))
                      checked
                    @endif
                >
                <label class="form-check-label" for="appareil_{{ $appareil->id }}">
                  {{ $appareil->name }}
                </label>
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
              
  
  <input type="submit" value="sauvegarder" class="btn btn-primary">
  <a href="{{ route('admin.report.index') }}" class="btn btn-secondary">Retour</a>