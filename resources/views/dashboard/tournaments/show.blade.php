@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')

<div class="container-fluid">
    @include('layouts.headers.league')

        @if ($tournament->teams->count() < $tournament->number_teams)



        <div class="card shadow mt-8">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis Equipos</h3>
                    </div>
                    <div class="col text-right">
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEquipo">
                            Crear Equipo
                        </button>
                         --}}
                         {{ $tournament->number_teams-$tournament->teams->count() }}
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
                            <th scope="col">Jugadores</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournament->league->teams as $t)
                            @if (!$tournament->teams->contains($t->id))
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
                                    {{ $t->players->count() }}
                                </td>
                                <td>
                                    {{ $t->user->name }}
                                    <br>
                                    {{ $t->user->email }}

                                </td>
                                <td>

                                    <form method="POST" class="d-inline-block" action="{{ route('tournaments.addTeam') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                                        <input type="hidden" name="team_id" value="{{ $t->id }}">
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 btn-primary" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-plus"></i>&nbsp;Añadir a torneo</span>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @else
        <div class="row mt-8 py-3">
            <div class="col">
            <a class="btn btn-primary" href="{{ route('tournaments.getTable', $tournament->id) }}">Tabla de posiciones</a>
            <a class="btn btn-primary" href="{{ route('tournaments.getEstadisticas', $tournament->id) }}">Estadisticas</a>
            <a class="btn btn-primary" href="{{ route('tournaments.getOportunidades', $tournament->id) }}">Oportunidades</a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Juegos</h3>
                    </div>

                    <div class="col text-right">
                        @if (!$tournament->games()->exists() )
                        <a class="btn btn-lg btn-primary" href="{{ route('tournaments.setGames', $tournament->id) }}">
                            Crear rol de Juegos
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    @foreach ($tournament->games->groupBy('ronda') as $ronda=>$rid)
                        <div class="col-12 col-md-6 col-lg-5 mb-4">

                            <div class="card">
                                <div class="card-body">
                                    Jornada {{ $ronda }}
                                    <hr class="bg-white">
                                    @foreach ($rid as $tgs)
                                    <div class="row align-items-center justify-content-between mt-4">
                                        @foreach ($tgs->teams as $lgt)
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
                                            <div class="col-2">
                                                <a class="btn btn-primary" href="{{ route('games.edit', $tgs->id) }}">
                                                    Editar juego {{ $tgs->id }}
                                                </a>
                                            </div>
                                    </div>
                                    <div class="row justify-content-center py-3">                                        
                                            @if ($tgs->field_id != null)
                                            <div class="col-10">
                                                <h5>Estadio</h5>
                                                <p>{{ $tgs->field->location->name }} cancha {{ $tgs->field->name }}</p>
                                            </div>
                                            @endif
                                     
                                            @if ($tgs->referees()->exists())
                                            <div class="col-5">
                                                <h5>Arbitro</h5>
                                                @foreach ($tgs->referees as $gmRf)
                                                <p>{{ $gmRf->user->name }}</p>
                                                @endforeach
                                            </div>
                                            @endif
                                            @if ($tgs->start_time != null)
                                            <div class="col-5">
                                                <h5>Horario</h5>                                            
                                                <p>{{ Carbon::parse($tgs->start_time)->toDateTimeString(); }}</p>
                                            </div>
                                            @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

        @endif




    @include('layouts.footers.auth')
</div>


    @endsection