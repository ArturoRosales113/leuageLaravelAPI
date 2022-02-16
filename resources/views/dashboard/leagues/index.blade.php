@extends('layouts.app')

@section('content')

    @include('users.partials.leagues')

    <div class="container-fluid">
    
        
        <div class="card shadow mt-5">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis Ligas Playmaker</h3>
                    </div>
                    <div class="col text-right">
                         <a href="{{ route('leagues.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear liga</a>
                         <a href="{{ route('home') }}"" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
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
                            <th scope="col" data="id">ID</th>
                            <th scope="col" data="league_name">Liga</th>
                            <th scope="col" data="name">Deporte</th>
                            <th scope="col">Equipos</th>
                            <th scope="col">Status</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leagues as $lg)
                        <tr>
                            <th>
                                <span class="avatar-rectangle"> 
                                    <img alt="Image placeholder" src="{{ $lg->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lg->icon_path) }}">
                                </span>
                            </th>
                            <td>
                               <a href="{{ route('leagues.show', $lg->id) }}" class="text-default text-underline">
                                {{ $lg->id }}
                               </a>
                            </td>
                            <td>
                               <a href="{{ route('leagues.show', $lg->id) }}" class="text-default text-underline">
                                {{ $lg->name }}
                               </a>
                            </td>
                            <td>
                                {{ $lg->sport->display_name }}
                            </td>
                            <td>
                                {{ $lg->teams->count() }}
                            </td>
                            <td>
                                Activa
                            </td>
                            <td>
                                <a href="{{ route('leagues.edit', $lg->id) }}" class="btn btn-icon btn-2 btn-primary">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </a>
    
                                <form method="POST" class="d-inline-block" action="{{ route('leagues.delete', $lg->id) }}">
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
