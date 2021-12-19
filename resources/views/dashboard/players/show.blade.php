@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hola') . ' '. $player->user->name,
'description' => __('Esta es tu ficha de jugador aquí verás tu progeso y estadísticas de juego.'),
'class' => 'col-lg-12',
'portada' => $player->img_path
])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <span class="rounded-circle">
                                aa                                    <img alt="Image placeholder" src="{{ $player->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $player->icon_path) }}">
                            </span>
                        </div>
                    </div>
                </div>
                <!--
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                -->
                <div class="card-body pt-0 pt-md-4 mt-5">
                    <div class="row pt-5 justify-content-center">
                        <div class="col-12 col-lg-10">

                                <div class="d-flex w-100 flex-column align-items-center align-items-lg-start py-3">
                                    <span class="heading">{{ $player->user->name }}</span>
                                    <span class="description">{{ __('Nombre') }}</span>
                                </div>
                                <div class="d-flex w-100 flex-column align-items-center align-items-lg-start py-3">
                                    <span class="heading">{{ $player->apodo }}</span>
                                    <span class="description">{{ __('Apodo') }}</span>
                                </div>
                                <div class="d-flex w-100 flex-column align-items-center align-items-lg-start py-3">
                                    <span class="heading">{{ $player->numero }}</span>
                                    <span class="description">{{ __('Dorsal') }}</span>
                                </div>
                                <div class="d-flex w-100 flex-column align-items-center align-items-lg-start py-3">
                                    <div class="row justify-content-center justify-content-lg-start mb-4">
                                        <div class="col-12 col-md-6">
                                            <img alt="Image placeholder" class="img-fluid" src="{{ $player->team->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $player->team->icon_path) }}">
                                        </div>
                                    </div>
                                    <span class="heading">{{ $player->team->name }}</span>
                                    <span class="description">{{ __('Equipo') }}</span>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 ">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">{{ __('Editar jugador') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('players.update', $player->id) }}" class="pl-5 pr-5">
                        @csrf
                        <input type="hidden" name="email" value="{{ $player->user->email }}">
                        <input type="hidden" name="team_id" value="{{ $player->team->id }}">
                        <input type="hidden" name="edad" value="{{ $player->edad }}">
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nombre del Jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $player->user->name) }}" id="player" placeholder="" >
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
                            <label for="Numero" class="col-sm-3 col-form-label">No. dentro del equipo</label>
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
                            <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                            <div class="col-sm-9">
                                <input type="text" name="peso" value="{{ old('peso' , $player->peso) }}" class="form-control" placeholder="88.10 kg" />
                            </div>
                        </div>
                                                    
                        <div class="form-group row">
                            <label for="estatura" class="col-sm-3 col-form-label">Estatura</label>
                            <div class="col-sm-9">
                                <input type="text" name="estatura" value="{{ old('estatura' , $player->estatura) }}" class="form-control" placeholder="80.5 cm" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email del jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" name="email" value="{{ old('email', $player->user->email) }}" placeholder="usuario@email.com" >
                            </div>
                        </div>
                       
                        
                        
                        
                        <fieldset disabled>
                            <div class="form-group row ">
                                <label for="Numero" class="col-sm-3 col-form-label">Pertenece al equipo</label>
                                <div class="col-sm-9">
                                    @isset($player)
                                    <select class="custom-select">
                                        <option value="{{ $player->team->id }}">{{ $player->team->name }}</option>
                                    </select>
                                    @endisset                                
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="edad" class="col-sm-3 col-form-label">Elige la edad</label>
                                <div class="col-sm-9">
                                    <select class="custom-select">
                                        <option selected value="0">Selecciona una opción</option>
                                        @for ($i = 6; $i < 51; $i++)
                                        <option {{ old('edad') == $i || $player->edad == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            


                        </fieldset>
                        
                        
                        
                        
                        
                        <hr class="bg-white text-white">
                        
                        <div class="form-group row">
                            <label for="perfil" class="col-sm-3 col-form-label">Foto de Perfil</label>
                            <div class="col-sm-9 pr-5">
                                <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>
                        <hr class="bg-white text-white">
                        <div class="form-group row">
                            <label for="img_path" class="col-sm-3 col-form-label">Foto de Portada</label>
                            <div class="col-sm-9 pr-5">
                                <input type="file" class="custom-file-input" name="img_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
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
