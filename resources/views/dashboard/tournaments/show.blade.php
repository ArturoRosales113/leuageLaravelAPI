@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')

<div class="container-fluid">
    @if ($tournament->teams->count() < $tournament->number_teams)
        <div class="card shadow mt-8">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis Equipos</h3>
                    </div>
                    <div class="col text-right">                        
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
        <div class="row mt-5 py-3">
            <div class="col">
            <a class="btn btn-sm btn-default" href="{{ route('tournaments.getTable', $tournament->id) }}">Tabla de posiciones</a>
            <a class="btn btn-sm btn-default" href="{{ route('tournaments.getEstadisticas', $tournament->id) }}">Estadisticas</a>
            <a class="btn btn-sm btn-default" href="{{ route('tournaments.getOportunidades', $tournament->id) }}">Oportunidades</a>
            </div>
            @hasanyrole('super-admin|league_administrator')
                <div class="col text-right">
                    <a href="{{ route('leagues.show' , $tournament -> league_id  ) }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                </div>
            @endhasanyrole
            @hasanyrole('team_administrator|player|referee')
                <div class="col text-right">
                    <a href="{{ route('home') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                </div>
            @endhasanyrole
        </div>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Calendarios de encuentros</h3>
                    </div>
                    <div class="col text-right">
                        @if (!$tournament->games()->exists() )
                        <a class="btn btn-sm btn-default" href="{{ route('tournaments.setGames', $tournament->id) }}">
                            Crear rol de Juegos
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body calendar">
                <div class="row justify-content-around">
                    @foreach ($tournament->games->groupBy('ronda') as $ronda=>$rid)
                        <div class="col-12 col-md-6 col-lg-5 mb-4">
                            <div class="card">
                                <div>
                                    <div class="centro jornada">Jornada {{ $ronda }}</div>
                                    <div class="itemsJornada">
                                        @foreach ($rid as $tgs)
                                        <div class="row align-items-center mt-4 top-card">
                                            @foreach ($tgs->teams as $lgt)
                                            <div class="col-4 text-center pd1">
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
                                        <div class="row justify-content-center details-card">                                        
                                                @if ($tgs->field_id != null)
                                                <div class="col-12 pdItem">
                                                    <h5 class="yellow centro">Estadio</h5>
                                                    <p class="centro">{{ $tgs->field->location->name }} // {{ $tgs->field->name }}</p>
                                                
                                                </div>
                                                @endif                                        
                                                @if ($tgs->referees()->exists())
                                                <div class="col-6 pdItem">
                                                    <h5 class="yellow">Arbitros</h5>
                                                    @foreach ($tgs->referees as $gmRf)
                                                    <p>{{ $gmRf->user->name }}</p>
                                                    @endforeach
                                                </div>
                                                @endif
                                                @if ($tgs->start_time != null)
                                                <div class="col-6 pdItem">
                                                    <h5 class="yellow">Horario</h5>                                            
                                                    <p>{{ Carbon::parse($tgs->start_time)->toDayDateTimeString(); }}</p>
                                                </div>
                                                @endif
                                        </div>
                                        @hasanyrole('super-admin|league_administrator')
                                        <div class="botones_encentros">
                                            <a class="btn btn-sm btn-default redBtn btnFull" href="{{ route('games.edit', $tgs->id) }}">
                                                Editar <span>{{ $tgs->id }}</span>
                                            </a>
                                            <a class="btn btn-sm btn-default redBtn btnFull" href="{{ 'http://playmate.playmakerleagues.com.mx/#/juego/'.$tgs->uid }}" target="_blank">
                                                Iniciar encuentro <span>{{ $tgs->id }}</span>
                                            </a>
                                        </div>
                                        @endhasanyrole
                                        @endforeach
                                    </div>
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