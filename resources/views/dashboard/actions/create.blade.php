@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    <div class="header bg-gradient-primary image-user pt-5 pl-5 pt-md-8 pb-md-8">
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
                                <h3 class="mb-0">Crear una acción</h3>
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
                        <form method="POST" enctype="multipart/form-data" action="" class="pl-5 pr-5">
                            @csrf
                            <div class="form-group row">
                                <label for="event_id" class="col-sm-3 col-form-label">Nombre de la acción</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="event_id" value="{{ old('event_id') }}" placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="game_id" class="col-sm-3 col-form-label">Acciones</label>
                                <div class="col-sm-9">
									<select class="form-control" name="game_id" placeholder="Selecciona un juego">
                                        <option> </option>
                                        <option> </option>
                                        <option> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="player_id" class="col-sm-3 col-form-label">Nombre del jugador</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="player_id" value="{{ old('player_id') }}" placeholder="" >
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