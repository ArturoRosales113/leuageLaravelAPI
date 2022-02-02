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
                         <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
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
                                {{ $tp->games->count() - $tp->pivot->jugados}}
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->ganados * 3 }}
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->puntos_favor }}
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->puntos_contra }}
                            </td>
                            <td class="centro">
                                {{ $tp->pivot->puntos_favor - $tp->pivot->puntos_contra}}
                            </td>
                        </tr>
     
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h1 class="text-white">Playoffs</h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-around">
                    @for ($i = 0 ; $i < $tournament->number_teams_playoffs/2 ; $i++)
                    <div class="col-5">
                        <div class="row align-items-center justify-content-between mt-4 top-card">
                            
                            <div class="col-4 text-center">
                                <a href="{{ route('teams.show', $predicciones[$i][0]['id'] ) }}" class="text-default text-underline">
                                    <img width="50px" alt="Image placeholder" src="{{ $predicciones[$i][0]['icon_path'] == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $predicciones[$i][0]['icon_path'] ) }}"> <br>
                                    <small>{{ $predicciones[$i][0]['name'] }}</small>                                        
                                </a>
                            </div>
                            
                                <div class="col-2 text-center">
                                    <span>VS</span>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="{{ route('teams.show', $predicciones[$i][1]['id'] ) }}" class="text-default text-underline">
                                        <img width="50px" alt="Image placeholder" src="{{ $predicciones[$i][1]['icon_path'] == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $predicciones[$i][1]['icon_path'] ) }}"> <br>
                                        <small>{{ $predicciones[$i][1]['name'] }}</small>                                        
                                    </a>
                                </div>
                            
                                
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>






@endsection