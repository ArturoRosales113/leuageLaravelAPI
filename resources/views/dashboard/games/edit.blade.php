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
                                <h3 class="mb-0">Editar juego {{ $game->id }}</h3>
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
                        <div class="row align-items-center justify-content-between mt-4">
                            @foreach ($game->teams as $lgt)
                            <div class="col-4 text-center">
                                <a href="{{ route('teams.show', $lgt->id) }}" class="text-default text-underline">
                                    <img width="50px" alt="Image placeholder" src="{{ $lgt->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lgt->icon_path) }}"> <br>
                                    <small>{{ $lgt->name }}</small>                                        
                                </a>
                            </div>
                            @if ($loop->first)
                                <div class="col-2 text-center">
                                    <span>VS</span>
                                </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('games.update', $game->id) }}" class="pl-3 pr-3">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="tournament_id" value="{{ $game->tournament_id }}">
                                    <input type="hidden" name="modality_id" value="{{ $game->modality_id }}">
                                    
                                    @hasanyrole('super-admin')
        
                                    
                                    @endhasanyrole
                                    <div class=" row">
                                        <label for="field_id" class="col-md-12 col-form-label">Selecciona una Campo</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="field_id" placeholder="Selecciona una liga">
                                                    <option selected value="0">Selecciona una opción</option>
                                                    @foreach ($game->tournament->league->locations as $loc)
                                                    <optgroup label="{{ $loc->name }}">
                                                        @foreach ($loc->fields as $fld)
                                                            <option  {{ old('field_id') == $fld->id || $game->field_id == $fld->id ? 'selected' : '' }} value="{{ $fld->id }}">{{ $fld->name }}</option>t
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class=" row">
                                        <label for="referee_id" class="col-md-12 col-form-label">Selecciona un arbitro</label>
                                        <div class="col-md-12">
                                            <select class="custom-select" name="referee_id">
                                            <option selected>Selecciona una opción</option>
                                            @foreach ($game->tournament->league->referees as $rfs)
                                                <option  {{ old('referee_id') == $rfs->id || $game->referees->contains($rfs->id) ? 'selected' : '' }} value="{{ $rfs->id }}">{{ $rfs->user->name }}</option>t
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <label for="start_time" class="col-md-10 col-form-label">Selecciona un horario </label>
                                        <div class="col-md-10">
                                            <input type="datetime-local" id="meeting-time"
                                            name="start_time" value="{{ Carbon::now()->toDateTimeLocalString() }}"
                                            min="{{ Carbon::today()->toDateTimeLocalString() }}" max="{{ Carbon::today()->addYear()->addDay()->toDateTimeLocalString() }}">
                                        </div>
                                    </div>

                                
                                <br>
                                
                                    <button class="btn btn-primary" type="submit">Guardar</button>                        
                                </form>
                            </div>
                        </div>
                    </div>
    
                    
                    
                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
        </div>

    </div>
@endsection