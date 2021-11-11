<form method="POST" enctype="multipart/form-data" action="{{ route('players.store') }}" class="pl-3 pr-3">
    @csrf
    <div class="row">
        <label for="name" class="col-md-12 col-form-label">Nombre del Jugador</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="player" placeholder="" >
        </div>
    </div>
    <div class="row">
        <label for="email" class="col-md-12 col-form-label">Email del jugador</label>
        <div class="col-md-12">
            <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="usuario@email.com" >
        </div>
    </div>
    <div class="row">
        <label for="posicion" class="col-md-12 col-form-label">Posición</label>
        <div class="col-md-12">
            <input type="text" class="form-control" id="posicion" name="posicion" value="{{ old('posicion') }}" placeholder="Defensa" >
        </div>
    </div>
    <div class="row">
        <label for="apodo" class="col-md-12 col-form-label">Apodo</label>
        <div class="col-md-12">
            <input type="text" class="form-control" id="apodo" name="apodo" value="{{ old('apodo') }}" placeholder="Apodo" >
        </div>
    </div>

    
    
    <div class="row">
        <label for="Numero" class="col-md-12 col-form-label">Pertenece al equipo</label>
        <div class="col-md-12">


            @isset($teams)
            <select class="custom-select" name="team_id">
            <option selected>Selecciona una opción</option>
                @foreach ($teams as $t)
                <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach    
            </select>
            @endisset
            @isset($individualTeam)
            <select class="custom-select" name="team_id">
                <option value="{{ $individualTeam->id }}">{{ $individualTeam->name }}</option>
            </select>
            @endisset
            
        </div>
    </div>

    <div class="row">
        <label for="perfil" class="col-md-12 col-form-label">Foto del jugador</label>
        <div class="col-sm-11 ml-3">
            <input type="file" class="custom-file-input" name="icon_path" id="customFile">
            <label class="custom-file-label" for="customFile">Cargar imagen</label>
        </div>
    </div>
    <div class="row">
        <label for="img_path" class="col-md-12 col-form-label">Foto de portada</label>
        <div class="col-sm-11 ml-3">
            <input type="file" class="custom-file-input" name="img_path" id="customFile">
            <label class="custom-file-label" for="customFile">Cargar imagen</label>
        </div>
    </div>


    <div class="row">
      <label for="Numero" class="col-md-12 col-form-label">No. dentro del equipo</label>
          <div class="col-md-12">
            <select class="custom-select" name="numero">
              <option selected value="0">Selecciona una opción</option>
              @for ($i = 1; $i < 100; $i++)
              <option {{ old('numero') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
    </div>
    <div class="row">
      <label for="edad" class="col-md-12 col-form-label">Elige la edad</label>
          <div class="col-md-12">
            <select class="custom-select" name="edad">
              <option selected value="0">Selecciona una opción</option>
              @for ($i = 6; $i < 51; $i++)
              <option {{ old('edad') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
    </div>
    <div class="row">
        <label for="estatura" class="col-md-12 col-form-label">Estatura</label>
        <div class="col-md-12">
            <input type="text" name="estatura" value="{{ old('estatura') }}" class="form-control" placeholder="80.5 cm" />
        </div>
    </div>
    <div class="row">
        <label for="peso" class="col-md-12 col-form-label">Peso</label>
        <div class="col-md-12">
            <input type="text" name="peso" value="{{ old('peso') }}" class="form-control" placeholder="88.10 kg" />
        </div>
    </div>
    <div class="form-group row pt-4 justify-content-center">
        <button class="btn btn-primary" type="submit">Guardar</button>      
    </div>


                         
</form>


