@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.arbitros')

<div class="container-fluid">
    @include('layouts.headers.userhead')
    
    <div class="row mt-8">
        <div class="col">
            <div class="card shadow pb-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">{{ $referee->user->name }}</h3>
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

                <form method="POST" enctype="multipart/form-data" action="{{ route('referees.update', $referee->id) }}" class="pl-5 pr-5">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nombre del arbitro</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $referee->user->name) }}" id="player" placeholder="" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email del arbitro</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Email" name="email" value="{{ old('email', $referee->user->email) }}" placeholder="usuario@email.com" >
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="Numero" class="col-sm-3 col-form-label">Es del tipo:</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="referee_type_id">
                            <option selected>Selecciona una opción</option>
                            @foreach ($refereeTypes as $rt)
                            <option {{ old('referee_type_id') == $rt->id || $referee->refereeType_id == $rt->id ? 'selected' : ''}} value="{{ $rt->id }}">{{ $rt->display_name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="perfil" class="col-sm-3 col-form-label">Foto de Perfil</label>
                        <div class="col-sm-8 ml-3">
                            <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                            <label class="custom-file-label" for="customFile">Cargar imagen</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="img_path" class="col-sm-3 col-form-label">Foto de Portada</label>
                        <div class="col-sm-8 ml-3">
                            <input type="file" class="custom-file-input" name="img_path" id="customFile">
                            <label class="custom-file-label" for="customFile">Cargar imagen</label>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="edad" class="col-sm-3 col-form-label">Elige la edad</label>
                          <div class="col-sm-9">
                            <select class="custom-select" name="edad">
                              <option>Selecciona una opción</option>
                              @for ($i = 6; $i < 61; $i++)
                              <option {{ old('edad') == $i || $referee->edad == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                    </div>
                    <div class="form-group row">
                        <label for="estatura" class="col-sm-3 col-form-label">Estatura</label>
                        <div class="col-sm-9">
                            <input type="text" name="estatura" class="form-control" value="{{ old('estatura', $referee->estatura) }}" placeholder="80.5 cm" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                        <div class="col-sm-9">
                            <input type="text" name="peso" class="form-control" value="{{ old('peso', $referee->peso) }}" placeholder="88.10 kg" />
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