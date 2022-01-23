@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')


    <div class="container-fluid">
    
    <div class="card mt-5">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Tabla de posiciones</h3>
                    </div>
                    <div class="col text-right">
                         <a href="{{ route('leagues.create') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                    </div>
                </div>
            </div>    
            <div class="table-responsive scrollbar-light-blue">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="posicion centro">Pos</th>
                            <th scope="col">Equipo</th>
                            <th scope="col" class="centro">PJ</th>
                            <th scope="col" class="ganados centro">PG</th>
                            <th scope="col" class="perdidos centro">PP</th>
                            <th scope="col" class="centro">Pendientes</th>
                            <th scope="col" class="centro">Pts.</th>
                            <th scope="col" class="centro">Pts favor</th>
                            <th scope="col" class="centro">Pts Contra</th>
                            <th scope="col" class="centro">Dif.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tournament->positions as $tp)
                        <tr>
                            <td class="posicion lugar centro">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                            {{ $tp->name }}
                                @if ($loop->iteration <= $tournament->number_teams_playoffs)
                                <br>
                                <span class="badge badge-success">En play offs</span>
                                @endif
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->jugados }}
                            </td>
                            <td class="centro ganados">
                                {{ $tp->pivot->ganados }}
                            </td>
                            <td class="perdidos centro">
                                {{ $tp->pivot->perdidos }}
                            </td>
                            <td class="centro">
                                1
                            </td>
                            <td class="centro">
                                1
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->puntos_favor }}
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->puntos_contra }}
                            </td>
                            <td class="centro">
                                1
                            </td>
                        </tr>
     
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>


   <!--     
<div class="container-fluid">
    <div class="row py-5 justify-content-center">
        <div class="col-1 text-center">
            <h5>Pos</h5>
        </div>
        <div class="col-2 text-left">
            <h5>Nombre</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Jugados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Ganados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Empatados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Perdidos</h5>
        </div>
        <div class="col text-center">
            <h5>Puntos a favor</h5>
        </div>
        <div class="col text-center">
            <h5>Puntos a en contra</h5>
        </div>
    </div>
    @foreach ($tournament->positions as $tp)
        <div class="row py-5 justify-content-center">
            <div class="col-1 text-center">
                {{ $loop->iteration }}
            </div>
            <div class="col-2 text-left">
                {{ $tp->name }}
                @if ($loop->iteration <= $tournament->number_teams_playoffs)
                <br>
                <span class="badge badge-success text-white">En play offs</span>
                @endif
                </div>
            <div class="col text-center">
                {{ $tp->pivot->jugados }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->ganados }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->empates }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->perdidos }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->puntos_favor }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->puntos_contra }}
            </div>
        </div>
        @if (!$loop->last)
            <hr class="bg-white">
        @endif
    @endforeach
</div>
-->


@endsection