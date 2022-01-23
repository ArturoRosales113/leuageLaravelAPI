@extends('layouts.app')

@section('content')

    @include('users.partials.players')

    <div class="container-fluid">
    @include('layouts.headers.userhead')

        <div class="card shadow mt-5">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis jugadores</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('players.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear jugador</a>
                    </div>
                </div>
            </div>    
            <div class="table-responsive scrollbar-light-blue">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" data="icon_path">
                                &nbsp;
                            </th>
                            <th scope="col" data="name">Nombre</th>
                            <th scope="col">Apodo</th>
                            <th scope="col" data="numero">No. de Dorso</th>
                            <th scope="col">Posición</th>
                            <!--
                            <th scope="col" data="edad">Edad</th>
                            <th scope="col" data="peso">Peso</th>
                            <th scope="col" data="estatura">Estatura</th>
                            -->
                            <th scope="col">Equipo</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @hasanyrole('super-admin')
                            @foreach ($players as $pl)
                            <tr>
                                <th>
                                    <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ $pl->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $pl->icon_path) }}">
                                    </span>
                                </th>
                                <td>
                                    <a href="{{ route('players.show', $pl->id) }}">
                                        {{ $pl->user->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $pl->apodo }}
                                </td>
                                <td>
                                    {{ $pl->numero }}
                                </td>
                                <td>
                                    {{ $pl->posicion }}
                                </td>
                                <!--
                                <td>
                                    {{ $pl->edad }}
                                </td>
                                
                                <td>
                                    {{ $pl->peso . ' kg' }}
                                </td>
                                <td>
                                    {{ $pl->estatura . ' cm'}}
                                </td>-->
                                <td>
                                    <a href="{{ route('teams.show', $pl->team->id) }}">
                                        {{ $pl->team->name }}
                                    </a>
                                    
                                </td>
                                
                                <td>
                                    <a href="{{ route('players.edit', $pl->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
                                    <form method="POST" class="d-inline-block" action="{{ route('players.delete', $pl->id) }}">
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
                        @endhasanyrole
                        @hasanyrole('league_administrator')
                            @foreach (auth()->user()->league->players as $pl)
                            <tr>
                                <th>
                                    <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ $pl->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $pl->icon_path) }}">
                                    </span>
                                </th>
                                <td>
                                    <a href="{{ route('players.show', $pl->id) }}">
                                        {{ $pl->user->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $pl->apodo }}
                                </td>
                                <td>
                                    {{ $pl->numero }}
                                </td>
                                <td>
                                    {{ $pl->posicion }}
                                </td>
                                <td>
                                    {{ $pl->edad }}
                                </td>
                                <td>
                                    {{ $pl->peso . ' kg' }}
                                </td>
                                <td>
                                    {{ $pl->estatura . ' cm'}}
                                </td>
                                <td>
                                    <a href="{{ route('teams.show', $pl->team->id) }}">
                                        {{ $pl->team->name }}
                                    </a>
                                    
                                </td>
                                
                                <td>
                                    <a href="{{ route('players.show', $pl->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
                                    {{-- <form method="POST" class="d-inline-block" action="{{ route('players.delete', $pl->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </div>
                                    </form> --}}
                                </td>
                            </tr>    
                            @endforeach
                        @endhasanyrole
                    </tbody>
                </table>
            </div>
        </div>

        


        @include('layouts.footers.auth')
    </div>
@endsection