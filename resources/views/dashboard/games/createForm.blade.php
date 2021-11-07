<form method="POST" enctype="multipart/form-data" action="{{ route('games.store') }}" class="pl-3 pr-3">
    @csrf
    <div class=" row">
        <label for="modality_id" class="col-md-12 col-form-label">Modalidad</label>
        <div class="col-md-12">
            <select class="form-control" name="modality_id" placeholder="Selecciona una liga">
                <option selected value="0">Selecciona una opción</option>
                @foreach ($modalities as $mdl)
                    <option  {{ old('modality_id') == $mdl->id ? 'selected' : '' }} value="{{ $mdl->id }}">{{ $mdl->name }}</option>t
                @endforeach
            </select>        </div>
    </div>
    <div class=" row">
      <label for="league_id" class="col-md-12 col-form-label">Selecciona una liga</label>
          <div class="col-md-12">
            @isset($leagues)
            <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                <option selected value="0">Selecciona una opción</option>
                @foreach ($leagues as $l)
                    <option  {{ old('league_id') == $l->id ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>t
                @endforeach
            </select>
            @endisset
            @isset($individualLeague)
            <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                <option  value="{{ $individualLeague->id }}" selected>{{ $individualLeague->name }}</option>t
            </select>
            @endisset
          </div>
    </div>
        <div class=" row">
            <label for="field_id" class="col-md-12 col-form-label">Selecciona una Campo</label>
                <div class="col-md-12">
                    <select class="form-control" name="field_id" placeholder="Selecciona una liga">
                        <option selected value="0">Selecciona una opción</option>
                        @foreach ($fields as $fld)
                            <option  {{ old('field_id') == $fld->id ? 'selected' : '' }} value="{{ $fld->id }}">{{ $fld->name }}</option>t
                        @endforeach
                    </select>
                </div>
        </div>
        <div class=" row">
            <label for="referee_id" class="col-md-12 col-form-label">Selecciona un arbitro</label>
            <div class="col-md-12">
                <select class="custom-select" name="referee_id">
                <option selected>Selecciona una opción</option>
                @foreach ($referees as $rfs)
                    <option  {{ old('referee_id') == $rfs->id ? 'selected' : '' }} value="{{ $rfs->id }}">{{ $rfs->user->name }}</option>t
                @endforeach
                </select>
            </div>
        </div>
        <div class=" row">
            <label for="teams[]" class="col-md-12 col-form-label">Selecciona un arbitro</label>
            <div class="col-md-12">
                <select class="custom-select" multiple="multiple" name="teams[]">
                <option selected>Selecciona una opción</option>
                @foreach ($league->teams as $lgtm)
                    <option   value="{{ $lgtm->id }}">{{ $lgtm->name }}</option>t
                @endforeach
                </select>
            </div>
        </div>
        <div class=" row">
            <label for="start_time" class="col-md-10 col-form-label">Selecciona un horario </label>
            <div class="col-md-10">
                {{  Carbon::today()->addYear()->addDay()->locale('es_MX')->diffForHumans() }}
                <input type="datetime-local" id="meeting-time"
                name="start_time" value="{{ Carbon::now()->toDateTimeLocalString() }}"
                min="{{ Carbon::today()->toDateTimeLocalString() }}" max="{{ Carbon::today()->addYear()->addDay()->toDateTimeLocalString() }}">
            </div>
        </div>
        {{-- <div class=" row">
            <label for="referee_id" class="col-md-12 col-form-label">Asignar arbitros</label>
            <div class="col-md-12">
              <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
                <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
            </div>
        </div> --}}

<br>

    <button class="btn btn-primary" type="submit">Guardar</button>                        
</form>