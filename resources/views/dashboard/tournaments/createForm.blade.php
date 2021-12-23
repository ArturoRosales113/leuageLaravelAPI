<form method="POST" enctype="multipart/form-data" action="{{ route('tournaments.store') }}" class="pl-5 pr-5">
    @csrf
    <div class="form-group row">
        <label for="league" class="col-sm-3 col-form-label">Nombre del torneo</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="league" placeholder="Liga Valle Verde" >
        </div>
    </div>
    <div class="form-group row">
        <label for="sport" class="col-sm-3 col-form-label">Elige una Categoría</label>
            <div class="col-sm-9">
              <select class="custom-select" name="sport_id">
                <option selected>Selecciona una opción</option>
                @foreach ($categories as $c)
                <option {{ old('category_id') == $c->id ? 'selected' : ''}} value="{{ $c->id }}">{{ $c->display_name }}</option>`
                @endforeach
              </select>
            </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-3 col-form-label">Descripción</label>
        <div class="col-sm-9">
            <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la liga">{{ old('description') }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="logo" class="col-sm-3 col-form-label">Logo del toreno</label>
        <div class="col-sm-8 ml-3">
            <input type="file" class="custom-file-input" name="icon_path" id="customFile">
            <label class="custom-file-label" for="customFile">Cargar imagen</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="img_path" class="col-sm-3 col-form-label">Portada del torneo</label>
        <div class="col-sm-8 ml-3">
            <input type="file" class="custom-file-input" name="img_path" id="customFile">
            <label class="custom-file-label" for="customFile">Cargar imagen</label>
        </div>
    </div>
    <div class="form-group row">
      <label for="n-teams" class="col-sm-3 col-form-label">No. de Equipos</label>
          <div class="col-sm-9">
            <select class="custom-select" name="number_teams">
              <option selected value="0">Selecciona una opción</option>

              @for ($i = 1; $i < 41; $i++)
              <option {{ old('number_teams') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
              @endfor

            </select>
          </div>
    </div>
    <div class="form-group row">
      <label for="n-teams" class="col-sm-3 col-form-label">Equipos en play offs</label>
          <div class="col-sm-9">
            <select class="custom-select" name="number_teams">
              <option selected value="0">Selecciona una opción</option>

              @for ($i = 1; $i < 21; $i++)
              <option {{ old('number_teams') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
              @endfor

            </select>
          </div>
    </div>

    <div class="form-group row">
      <label for="n-teams" class="col-sm-3 col-form-label">Periodos por partido</label>
          <div class="col-sm-9">
            <select class="custom-select" name="number_periods">
              <option selected value="0">Selecciona una opción</option>

              @for ($i = 1; $i < 21; $i++)
              <option {{ old('number_periods') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
              @endfor

            </select>
          </div>
    </div>

    <div class="form-group row">
        <label for="n-teams" class="col-sm-3 col-form-label">Tiempo por periodo (minutos)</label>
            <div class="col-sm-9">
              <select class="custom-select" name="period_lenght">
                <option selected value="0">Selecciona una opción</option>
  
                @for ($i = 1; $i < 21; $i++)
                <option {{ old('period_lenght') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                @endfor
  
              </select>
            </div>
      </div>

    <div class="form-group row">
        <label for="n-teams" class="col-sm-3 col-form-label">Duración tiempo fuera (minutos)</label>
            <div class="col-sm-9">
              <select class="custom-select" name="period_lenght">
                <option selected value="0">Selecciona una opción</option>
  
                @for ($i = 1; $i < 21; $i++)
                <option {{ old('period_lenght') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                @endfor
  
              </select>
            </div>
      </div>

    
    <div class="form-group row">
        <label for="Email" class="col-sm-3 col-form-label">Cargar reglamento</label>
        <div class="col-sm-8 ml-3">
            <input type="file" class="custom-file-input" name="reglamento_path" id="customFile">
            <label class="custom-file-label" for="customFile">Subir documento</label>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Guardar</button>                        
</form>
