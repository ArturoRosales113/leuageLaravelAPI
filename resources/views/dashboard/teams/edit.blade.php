@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div class="header bg-gradient-default image-user pt-5 pl-5 pt-md-8 pb-md-8">
    &nbsp;
</div>

<div class="container-fluid">
    @include('layouts.headers.userhead')
    
    <div class="row mt-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Editar {{ $team->name }}</h3>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('teams.update', $team->id) }}" class="pl-5 pr-5">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 col-form-label">Nombre del equipo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $team->name) }}" placeholder="" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Liga" class="col-sm-3 col-form-label">Selecciona una liga</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                                    <option selected value="0">Selecciona una opción</option>
                                    @foreach ($leagues as $l)
                                        <option  {{ old('league_id') == $l->id || $team->id == $l->id ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>t
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del equipo">{{ old('description', $team->description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Img_path" class="col-sm-3 col-form-label">Cargar Portada</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile" name="img_path">
                                <label class="custom-file-label" for="customFile">Cargar Imagen</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Icon_path" class="col-sm-3 col-form-label">Cargar escudo del equipo</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile" name="icon_path">
                                <label class="custom-file-label" for="customFile">Subir icono</label>
                            </div>
                        </div>

                        <!-- Este es para crear el Usuario dueño del equipo -->

                        
                        <button class="btn btn-primary" type="submit">Guardar</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
        @include('layouts.footers.auth')
</div>
@endsection