@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-8">
            <div class="col">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Editar {{ $player->user->name }}</h3>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('players.update', $player->id) }}" class="pl-5 pr-5">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nombre del Jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $player->user->name) }}" id="player" placeholder="" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email del jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" name="email" value="{{ old('email', $player->user->email) }}" placeholder="usuario@email.com" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="posicion" class="col-sm-3 col-form-label">Posición</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="posicion" name="posicion" value="{{ old('posicion', $player->posicion) }}" placeholder="Defensa" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apodo" class="col-sm-3 col-form-label">Apodo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="apodo" name="apodo" value="{{ old('apodo', $player->apodo) }}" placeholder="Apodo" >
                            </div>
                        </div>
                    
                        
                        
                        <div class="form-group row">
                            <label for="Numero" class="col-sm-3 col-form-label">Pertenece al equipo</label>
                            <div class="col-sm-9">
                                @isset($player)
                                <select class="custom-select" name="team_id">
                                    <option value="{{ $player->team->id }}">{{ $player->team->name }}</option>
                                </select>
                                @endisset                                
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="perfil" class="col-sm-3 col-form-label">Foto de Perfil</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="img_path" class="col-sm-3 col-form-label">Foto de Portada</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="img_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div> --}}
                    
                    
                        <div class="form-group row">
                          <label for="Numero" class="col-sm-3 col-form-label">No. del jugador</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="numero">
                                  <option selected value="0">Selecciona una opción</option>
                                  @for ($i = 1; $i < 100; $i++)
                                  <option {{ old('numero') == $i || $player->numero == $i ?  'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                          <label for="edad" class="col-sm-3 col-form-label">Elige la edad</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="edad">
                                  <option selected value="0">Selecciona una opción</option>
                                  @for ($i = 6; $i < 71; $i++)
                                  <option {{ old('edad') == $i || $player->edad == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="estatura" class="col-sm-3 col-form-label">Estatura</label>
                            <div class="col-sm-9">
                                <input type="text" name="estatura" value="{{ old('estatura' , $player->estatura) }}" class="form-control" placeholder="1.85 m" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                            <div class="col-sm-9">
                                <input type="text" name="peso" value="{{ old('peso' , $player->peso) }}" class="form-control" placeholder="88.10 kg" />
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