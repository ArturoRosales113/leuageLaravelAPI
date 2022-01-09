@extends('layouts.app')

@section('content')

    @include('users.partials.leagues')

    <div class="container-fluid">
    @include('layouts.headers.league')
        
        <div class="card shadow mt-8">
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

        <div class="row mt-5">
            <div class="col-xl-4 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mejor equipo ofensivo</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Posición</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <p>Power Rangers</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>1</p>
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
                                <h3 class="mb-0">Mejor equipo defensivo</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Posición</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <p>Chicago Bulls</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>2</p>
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
                                <h3 class="mb-0">Mejor encestador</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <tbody>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" data="league_name" style="text-align: center;" >Jugador</th>
                                        <th scope="col" data="league_name" style="text-align: rigth;" >Anotaciones</th>
                                    </tr>
                                    
                                </thead>
                                <tr>
                                    <th scope="row" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <p>Humberto Huerta</p>
                                    </th>

                                    <td style="text-align: center;">
                                        <p>115</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>



        <div class="row mt-5">
            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de 3 puntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Power Rangers</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de media distancia 2 Puntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                        <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                        <th scope="col" data="league_name" style="text-align: rigth;" >Puntos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">
                                            <p>1</p>
                                        </td>
                                        <td class="center-v" style="text-align: center;">
                                            <div class="rounded-circle border-b avatar">
                                                <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                            </div>
                                            <span>Power Rangers</span>
                                        </td>
                                        <td style="text-align: center;">
                                            <p>5.3</p>
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros libres 1 punto</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Power Rangers</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>





        <h1>Top 5 de encestes por Jugador</h1>
        <div class="row mt-2">
            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de 3 puntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Jugador</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Stephen Curry</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>Chicago</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de media distancia 2 Puntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Jugador</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Stephen Curry</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>Chicago</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros libres 1 punto</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Jugador</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Stephen Curry</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>Chicago</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

        <h1>Fair Play</h1>
        <div class="row mt-2">
            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Equipos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Lakers</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de media distancia 2 Puntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Jugador</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Stephen Curry</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>Chicago</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>




        <h1>Fair Play</h1>
        <div class="row mt-2">
            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Jugadores</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >jugador</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Lakers</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tiros de media distancia 2 Pntos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive scrollbar-light-blue">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" data="league_name" style="text-align: center;" >Pos</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Jugador</th>
                                    <th scope="col" data="league_name" style="text-align: rigth;" >Equipo</th>
                                    <th scope="col" data="league_name" style="text-align: center;" >Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <p>1</p>
                                    </td>
                                    <td class="center-v" style="text-align: center;">
                                        <div class="rounded-circle border-b avatar">
                                            <img alt="jugador" src="{{ asset('argon/img/theme/team-4-800x800.jpg') }}">
                                        </div>
                                        <span>Stephen Curry</span>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>Chicago</p>
                                    </td>
                                    <td style="text-align: center;">
                                        <p>5.3</p>
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