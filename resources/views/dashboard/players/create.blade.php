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
                                <h3 class="mb-0">Registrar Jugador</h3>
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
                                <select class="custom-select" name="posicion">
                                    <option value="null" selected>Selecciona una opción</option>
                                        <option value="Alero">Alero</option>
                                        <option value="Poste">Poste</option>
                                        <option value="Centro">Centro</option>
                                    </select>
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
                                <option value="0" selected>Selecciona una opción</option>
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
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <label for="img_path" class="col-md-12 col-form-label">Foto de portada</label>
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input" name="img_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div> --}}
                    
                        <div class="row">
                          <label for="Numero" class="col-md-12 col-form-label">No. del jugador</label>
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
                                  @for ($i = 6; $i < 71; $i++)
                                  <option {{ old('edad') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                                </select>
                              </div>
                        </div>

                        <div class="row">
                            <label for="estatura" class="col-md-12 col-form-label">Estatura</label>
                            <div class="col-md-12">
                                <input type="text" name="estatura" value="{{ old('estatura') }}" class="form-control" placeholder="1.85 m" />
                            </div>
                        </div>

                        <div class="row">
                            <label for="peso" class="col-md-12 col-form-label">Peso</label>
                            <div class="col-md-12">
                                <input type="text" name="peso" value="{{ old('peso') }}" class="form-control" placeholder="88.10 kg" />
                            </div>
                        </div>
                        
                         <button class="btn btn-primary mt-4" type="submit">Guardar</button>                        
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
        </div>

    </div>
@endsection