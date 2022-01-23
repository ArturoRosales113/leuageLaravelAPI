@extends('layouts.app')

@section('content')

    @include('users.partials.teams')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Crear Equipos</h3>
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('teams.store') }}" class="pl-5 pr-5">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre del equipo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-3 col-form-label">Nombre del Responsable</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="captain_name" value="{{ old('user_id') }}"  placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email del responsablew</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="usuario@email.com" >
                                </div>
                            </div>
                            @hasanyrole('super-admin')
                            <div class="form-group row">
                              <label for="sport" class="col-sm-3 col-form-label">Elige una liga</label>
                                  <div class="col-sm-9">
                                    <select class="custom-select" name="league_id">
                                      <option selected value="0">Selecciona una opción</option>
                                      @foreach ($leagues as $l)
                                      <option {{ old('league_id') == $l->id ? 'selected' : ''}} value="{{ $l->id }}">{{ $l->name }}</option>`
                                      @endforeach
                                    </select>
                                  </div>
                             </div>
                            @endhasanyrole
                        
                            @hasanyrole('league_administrator')
                             <input type="hidden" name="league_id" value="{{ auth()->user()->league->id }}">
                            @endhasanyrole
                            <div class="form-group row">
                                <label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del equipo">{{ old('description') }}</textarea>
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

