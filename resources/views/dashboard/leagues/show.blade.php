@extends('layouts.app')

@section('content')

    @include('users.partials.leagues')

<div class="container-fluid">
    
    <div class="row">
        <div class="col">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Torneos</h3>
                        </div>
                        
                
    
                        <div class="col text-right">
                            <a class="btn btn-sm btn-default" href="{{ route('tournaments.create') }}">
                                Crear torneo
                            </a>
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
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categorías</th>
                                <th scope="col">No. Equipos</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->tournaments as $lt)
                            <tr>
                                <th>
                                    <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ $lt->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lt->icon_path) }}">
                                    </span>
                                </th>
                                <td scope="row">    
                                    {{ $lt->id  }}
                                </td>
                                <td scope="row">    
                                  <a href="{{ route('tournaments.show', $lt->id) }}">
                                    {{ $lt->name  }}
                                  </a>
                                </td>
                                <td scope="row">    
                                    {{ $lt->category->display_name  }}
                                </td>
                                <td>
                                   {{ $lt->number_teams }}
                                </td>
                                <td>
                                    <a href="{{ route('tournaments.edit', $lt->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
                                    <form method="POST" class="d-inline-block" action="{{ route('tournaments.delete', $lt->id) }}">
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
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Mis Equipos</h3>
                        </div>
                        <div class="col text-right">
                            <a class="btn btn-sm btn-default" href="{{ route('teams.create') }}">
                                Crear Equipo
                            </a>
                            
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
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <!--
                                <th scope="col">Jugadores</th>
                                <th scope="col">Capitan</th>
                                -->
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
                                        {{ $t -> id }}
                                    </a>
                                </td>
                                <td scope="row">
                                    <a href="{{ route('teams.show', $t->id) }}" class="text-default text-underline">
                                        {{ $t -> name }}
                                    </a>
                                </td>
                                <!--
                                <td>
                                    {{ $t->players->count() }}
                                </td>
                                <td>
                                    @if ($t->players->where('is_captain', '=' ,1)->count() > 1 )
                                    {{ $t->players->where('is_captain', '=' ,1)->first()->user->name }}
                                    @endif
                                   
                                </td>
                                -->
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
        <!--
        <div class="col-12 col-lg-6">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Juegos</h3>
                        </div>
                        
                
    
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalJuego">
                                Crear Juego
                            </button>
                        </div>
                    </div>
                </div>    
                <div class="table-responsive scrollbar-light-blue">
                   
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Equipos</th>
                                <th scope="col">Estadio/Cancha</th>
                                <th scope="col">Arbitros</th>
                                <th scope="col">Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->games as $lg)
                            <tr>
                                <td scope="row" class="encuentros">    
                                    @foreach ($lg->teams as $lgt)
                                    <a href="{{ route('teams.show', $lgt->id) }}" class="text-default text-underline">
                                        
                                        <span class="avatar-rectangle">
                                            <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lgt->icon_path) }}">
                                        </span>
                                    
                            
                                    </a>
                                    {{ $loop->first ? ' vs ' : '' }}
                                    @endforeach
                                </td>

                                <td>
                                   @if ($lg->field != null) {{ $lg->field->location->name . '//' .  $lg->field->name }} @endif
                                </td>

                                <td>
                                   @foreach ($lg->referees as $lgr)
                                        {{ $lgr->user->name }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ Carbon::parse($lg->start_time)->toDayDateTimeString(); }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>-->
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


  

{{-- Modal juego --}}
<div class="modal fade" id="modalJuego" tabindex="-1" aria-labelledby="modalJuego" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear Torneo</h5>
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
{{-- Modal torneo --}}
<div class="modal fade" id="modalTorneo" tabindex="-1" aria-labelledby="modalTorneo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Torneo</h5>
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
    
                    @include('dashboard.tournaments.createForm')
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

    @endsection