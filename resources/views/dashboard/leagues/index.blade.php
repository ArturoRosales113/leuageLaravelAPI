@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis Ligas Playmaker</h3>
                    </div>
                    <div class="col text-right">
                         <a href="{{ route('leagues.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear liga</a>
                    </div>
                </div>
            </div>    
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" data="icon_path">
                                &nbsp;
                            </th>
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
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ $lg->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lg->icon_path) }}">
                                </span>
                            </th>
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

        <div class="row mt-5">
        <div class="col-xl-4 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mis ligas favoritas</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="icon_path">
                                        &nbsp;
                                    </th>
                                    <th scope="col" data="league_name">Liga</th>
                                    <th scope="col">Favorito</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                       
                                    </th>
                                    <td>
                                        <a href="">Liga del Bajío</a>
                                    </td>
                                    <td>
                                        <i class="fas fa-star"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mis equipos favoritos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="icon_path">
                                        &nbsp;
                                    </th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Posición</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                       
                                    </th>
                                    <td>
                                        <a href="">Power Rangers</a>
                                    </td>
                                    <td>
                                        Posición
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mis jugadores top</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="icon_path">
                                        &nbsp;
                                    </th>
                                    <th scope="col" data="league_name">Nombre</th>
                                    <th scope="col">Anotaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                       
                                    </th>
                                    <td>
                                        <a href="">Julio</a>
                                    </td>
                                    <td>
                                        115
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>




        @include('layouts.footers.auth')
    </div>
@endsection