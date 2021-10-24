@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis deportes</h3>
                    </div>
                    <div class="col text-right">
                                                <a href="{{ route('fields.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear campo</a>

                    </div>
                </div>
            </div>    
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                                &nbsp;
                            </th>
                            <th scope="col" data="name">Deporte</th>
                            <th scope="col">Campos</th>
                            <th scope="col">Ligas</th>
                            <th scope="col">Equipos</th>
                            <th scope="col">Jugadores</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sports as $sp)
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                {{ $sp->display_name }}
                            </td>
                            <td>
                                {{-- {{ $sp->fields }} --}}
                            </td>
                            <td>
                                {{ $sp->leagues->count() }}
                            </td>
                            <td>
                                {{-- {{ $sp->teams }} --}}
                            </td>
                            <td>
                                {{-- {{ $sp->players }} --}}
                            </td>
                            <td>
                                <a href="{{ route('teams.edit', $sp->id) }}" class="btn btn-icon btn-2 btn-primary">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </a>
    
                                <form method="POST" class="d-inline-block" action="{{ route('teams.delete', $sp->id) }}">
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


        @include('layouts.footers.auth')
    </div>
@endsection