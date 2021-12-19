@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.head')
    
    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-8">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Editar {{ $field->name }}</h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('fields.update', $field->id) }}" class="pl-5 pr-5">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre campo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $field->name) }}" placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del campo">{{ old('description', $field->description) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Image_perfil" class="col-sm-3 col-form-label">Cargar foto de deporte</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="img_path">
                                    <label class="custom-file-label" for="customFile">Cargar Imagen</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Portada" class="col-sm-3 col-form-label">Cargar Icono</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="icon_path">
                                    <label class="custom-file-label" for="customFile">Subir icono</label>
                                </div>
                            </div>
                        
                        
                            <div class="form-group row">
                                <label for="Numero" class="col-sm-3 col-form-label">Pertenece al estadio</label>
                                <div class="col-sm-9">
                        
                                    <select class="custom-select" name="location_id">
                                        <option value="{{ $field->id }}">{{ $field->name }}</option>
                                    </select>
                                    
                                    
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="Material" class="col-sm-3 col-form-label">Material</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="material_id">
                                        <option value="0" selected>Selecciona una opción</option>
                                        @foreach ($materials as $m)
                                        <option {{ old('material_id') == $m->id || $field->material_id == $m->id ? 'selected' : ''}} value="{{ $m->id }}">{{ $m->display_name }}</option>`
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="whidth" class="col-sm-3 col-form-label">Ancho</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="width" value="{{ old('width', $field->width) }}" placeholder="Ancho" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="height" class="col-sm-3 col-form-label">Largo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="height" value="{{ old('height', $field->height) }}" placeholder="Largo" >
                                </div>
                            </div>
                        
                            <button class="btn btn-primary" type="submit">Guardar</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
    </div>
@endsection