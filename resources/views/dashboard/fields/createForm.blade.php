<form method="POST" enctype="multipart/form-data" action="{{ route('fields.store') }}" class="pl-5 pr-5">
    @csrf
    <div class="form-group row">
        <label for="Name" class="col-md-12 col-form-label">Nombre campo</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" >
        </div>
    </div>
    <div class="form-group row">
        <label for="Description" class="col-md-12 col-form-label">Descripción</label>
        <div class="col-md-12">
            <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del campo">{{ old('description') }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="Image_perfil" class="col-md-12 col-form-label">Cargar foto de deporte</label>
        <div class="col-md-10 ml-2">
            <input type="file" class="custom-file-input" id="customFile" name="img_path">
            <label class="custom-file-label" for="customFile">Cargar Imagen</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="Portada" class="col-md-12 col-form-label">Cargar Icono</label>
        <div class="col-md-12 ml-2">
            <input type="file" class="custom-file-input" id="customFile" name="icon_path">
            <label class="custom-file-label" for="customFile">Subir icono</label>
        </div>
    </div>


    <div class="form-group row">
        <label for="Numero" class="col-md-12 col-form-label">Pertenece al estadio</label>
        <div class="col-md-12">


            @isset($locations)
            <select class="custom-select" name="location_id">
            <option selected>Selecciona una opción</option>
            @foreach ($locations as $l)
            <option {{ old('location_id') == $l->id ? 'selected' : ''}} value="{{ $l->id }}">{{ $l->display_name }}</option>`
            @endforeach  
            </select>
            @endisset
            @isset($individualLocation)
            <select class="custom-select" name="location_id">
                <option value="{{ $individualLocation->id }}">{{ $individualLocation->name }}</option>
            </select>
            @endisset
            
        </div>
    </div>

    <div class="form-group row">
        <label for="Material" class="col-md-12 col-form-label">Material</label>
        <div class="col-md-12">
            <select class="custom-select" name="material_id">
                <option value="0" selected>Selecciona una opción</option>
                @foreach ($materials as $m)
                <option {{ old('material_id') == $m->id ? 'selected' : ''}} value="{{ $m->id }}">{{ $m->display_name }}</option>`
                @endforeach
              </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="whidth" class="col-md-12 col-form-label">Ancho</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="width" value="{{ old('width') }}" placeholder="Ancho" >
        </div>
    </div>
    <div class="form-group row">
        <label for="height" class="col-md-12 col-form-label">Largo</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="height" value="{{ old('height') }}" placeholder="Largo" >
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Guardar</button>                        
</form>