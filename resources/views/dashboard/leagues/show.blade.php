@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => $league->name,
    'description' => $league->description,
    'class' => 'col-lg-12',
    'portada' => $league->img_path
    ])   

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Mis Equipos</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEquipo">
                           Crear Equipo
                              </button>
                            
                        </div>
                    </div>
                </div>    
                <div class="table-responsive scrollbar-light-blue">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    &nbsp;
                                </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Jugadores</th>
                                <th scope="col">Capitan</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->teams as $t)
                            <tr>
                                <th>
                                    <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $t->icon_path) }}">
                                    </span>
                                </th>
                                <td scope="row">
                                    <a href="{{ route('teams.show', $t->id) }}" class="text-default text-underline">
                                        {{ $t -> name }}
                                    </a>
                                </td>
                                <td>
                                   {{ $t->league->name }}
                                </td>
                                <td>
                                    {{ $t->players->count() }}
                                </td>
                                <td>
                                    @if ($t->players->where('is_captain', '=' ,1)->count() > 1 )
                                    {{ $t->players->where('is_captain', '=' ,1)->first()->user->name }}
                                    @endif
                                   
                                </td>
                                <td>
                                    <a href="{{ route('teams.edit', $t->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
        
                                    <form method="POST" class="d-inline-block" action="{{ route('teams.delete', $t->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Juegos</h3>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJuego">
                                Crear Juego
                            </button>
                        </div>
                    </div>
                </div>    
                <div class="table-responsive scrollbar-light-blue">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    &nbsp;
                                </th>
                                <th scope="col">Equipos</th>
                                <th scope="col">Estadio/Cancha</th>
                                <th scope="col">Arbitros</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->games as $lg)
                            <tr>
                                <th>
                                    <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $t->icon_path) }}">
                                    </span>
                                </th>
                                <td scope="row">    
                                    @foreach ($lg->teams as $lgt)
                                    <a href="{{ route('teams.show', $lgt->id) }}" class="text-default text-underline">
                                        {{ $lgt->name }}
                                    </a>
                                    {{ $loop->first ? ' vs ' : '' }}
                                    @endforeach
                                </td>
                                <td>
                                   {{ $lg->field->location->name . '//' .  $lg->field->name }}
                                </td>
                                <td>
                                    @foreach ($lg->referees as $lgr)
                                        {{ $lgr->user->name }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ Carbon::parse($lg->start_time)->diffForHumans(); }}
                                </td>
                                <td>
                                    {{-- <a href="{{ route('teams.edit', $lgt->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
         --}}
                                    <form method="POST" class="d-inline-block" action="{{ route('games.delete', $lg->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>


{{-- Modal equipo --}}
<div class="modal fade" id="modalEquipo" tabindex="-1" aria-labelledby="modalEquipo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Equipo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
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
    
                    @include('dashboard.teams.createForm', ['individualLeague' => $league])
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

{{-- Modal equipo --}}
<div class="modal fade" id="modalJuego" tabindex="-1" aria-labelledby="modalJuego" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-12">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
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
    
                    @include('dashboard.games.createForm', [
                        'individualLeague' => $league,
                        'fields' => $league->fields,
                        'referees' => $league->referees 
                        ])
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


    @endsection