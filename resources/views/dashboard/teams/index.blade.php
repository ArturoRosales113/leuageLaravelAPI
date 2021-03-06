@extends('layouts.app')

@section('content')

    @include('users.partials.teams')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-5">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis equipos</h3>
                    </div>
                    <div class="col text-right">
                        @hasanyrole('super-admin|league_administrator')
                        <a href="{{ route('teams.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear equipo</a>
                        @endhasanyrole
                        <a href="{{ route('home') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
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
                            <th scope="col">Status</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teams as $t)
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
                                <span class="estatus">{{ $t->is_active ? 'Activo' : 'Inactivo' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('teams.edit', $t->id) }}" class="btn btn-icon btn-2 btn-primary">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </a>
                                @hasanyrole('super-admin')
                                <form method="POST" class="d-inline-block" action="{{ route('teams.delete', $t->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                            
                                    <div class="form-group">
                                        <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        </button>
                                    </div>
                                </form>
                                @endhasanyrole
                                <form method="POST" class="d-inline-block" action="{{ route('teams.active', $t->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('POST') }}
                                    <div class="form-group">
                                        <button class="btn btn-icon btn-2 {{ $t->is_active ? 'btn-warning' : 'btn-success' }}" type="submit">
                                            <span class="btn-inner--icon"><i class=" {{ $t->is_active ? 'fas fa-ban' : 'fas fa-check' }}"></i></span>
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
        {{ $teams->onEachSide(5)->links() }}

        @include('layouts.footers.auth')
    </div>
@endsection