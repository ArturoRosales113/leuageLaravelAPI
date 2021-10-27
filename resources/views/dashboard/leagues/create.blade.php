@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Crear Ligas</h3>
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

                    <form method="POST" enctype="multipart/form-data" action="{{ route('leagues.store') }}" class="pl-5 pr-5">
                        @csrf
                        <div class="form-group row">
                            <label for="league" class="col-sm-3 col-form-label">Nombre de la liga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="league" placeholder="ej. Basketball" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email del presidente</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="usuario@email.com" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la liga">{{ old('description') }}</textarea>
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
                          <label for="n-teams" class="col-sm-3 col-form-label">No. de Equipos</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="numero_equipos">
                                  <option selected value="0">Selecciona una opción</option>

                                  @for ($i = 1; $i < 41; $i++)
                                  <option {{ old('numero_equipo') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor

                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                          <label for="sport" class="col-sm-3 col-form-label">Elige un deporte</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="sport_id">
                                  <option selected>Selecciona una opción</option>
                                  @foreach ($sports as $s)
                                  <option {{ old('sport_id') == $s->id ? 'selected' : ''}} value="{{ $s->id }}">{{ $s->display_name }}</option>`
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

    </div>
@endsection