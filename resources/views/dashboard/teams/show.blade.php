@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => $team->name,
    'description' => $team->description,
    'identifier' => 'ID: '.$team->id,
    'class' => 'col-lg-12',
    'portada' => $team->img_path
    ])   

<div class="container-fluid mt-4">
    <div class="row">
        
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Jugadores</h3>
                        </div>
                        <div class="col text-right">
                            @hasanyrole('league_administrator|super-admin|team_administrator')
                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalJugador">
                                    Crear Jugador
                                </button>
                            @endhasanyrole
                            <a href="{{ route('teams.index') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
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
                                <th scope="col" data="edad">Edad</th>
                                <th scope="col" data="peso">Peso</th>
                                <th scope="col">Altura</th>
                                <th scope="col">Status</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>                    
                            @hasanyrole('league_administrator|super-admin')
                            @foreach ($team->players as $pl)
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
                                    {{ $pl->is_active ? 'activa' : 'suspendida' }}
                                </td>
                                
                                <td>
                                    <a href="{{ route('players.edit', $pl->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>                                    
                                    <form method="POST" class="d-inline-block" action="{{ route('players.active', $pl->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 {{ $pl->is_active ? 'btn-warning' : 'btn-success' }}" type="submit">
                                                <span class="btn-inner--icon"><i class=" {{ $pl->is_active ? 'fas fa-ban' : 'fas fa-check' }}"></i></span>
                                            </button>
                                        </div>
                                    </form>        
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
                            @hasanyrole('player')
                            @foreach ($team->players as $pl)
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
                                    {{ $pl->is_active ? 'activa' : 'suspendida' }}
                                </td>                                
                                <td>
                                    <a href="{{ route('players.edit', $pl->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>         
                                </td>
                            </tr>    
                            @endforeach
                            @endhasanyrole
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
    @endsection



    

{{-- Modal Jugador --}}
<div class="modal fade" id="modalJugador" tabindex="-1" aria-labelledby="modalJugador" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-12 border-primary">
                <div class="card shadow pb-5 mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Registrar Jugador</h3>
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

                    @include('dashboard.players.createForm', ['individualTeam' => $team])
                </div>
            </div>
        </div>
    </div>
    </div>
</div>