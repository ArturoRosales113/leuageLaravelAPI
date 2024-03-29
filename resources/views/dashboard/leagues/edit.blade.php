@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.head')   

    <div class="container-fluid mt--7">
      
            
    <div class="row mt-5">
        <div class="col">
            <div class="card shadow pb-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Editar Ligas</h3>
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
                
                <form method="POST" enctype="multipart/form-data" action="{{ route('leagues.update', $league->id) }}" class="pl-5 pr-5">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="league" class="col-sm-3 col-form-label">Nombre de la liga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $league->name) }}" id="league" placeholder="ej. Basketball" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email del presidente</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Email" name="email" value="{{ old('email', $league->user->email) }}" placeholder="usuario@email.com" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Descripción</label>
                        <div class="col-sm-9">
                            <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la liga">{{ old('description', $league->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 col-form-label">Logo de la liga</label>
                        <div class="col-sm-8 ml-3">
                            <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                            <label class="custom-file-label" for="customFile">Cargar imagen</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="img_path" class="col-sm-3 col-form-label">Portada de liga</label>
                        <div class="col-sm-8 ml-3">
                            <input type="file" class="custom-file-input" name="img_path" id="customFile">
                            <label class="custom-file-label" for="customFile">Cargar imagen</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sport" class="col-sm-3 col-form-label">Elige un deporte</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="sport_id">
                                <option >Selecciona una opción</option>
                                @foreach ($sports as $s)
                                <option {{ old('sport_id') == $s->id || $league->sport_id == $s->id ? 'selected' : ''}} value="{{ $s->id }}">{{ $s->display_name }}</option>`
                                @endforeach
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
                
                
                
            </div>
        </div>
    </div>
        @include('layouts.footers.auth')
    </div>
@endsection