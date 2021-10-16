@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-default image-user pt-5 pl-5 pt-md-8 pb-md-8">
        &nbsp;
    </div>

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mi Campos</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">Ver todos</a>
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
                            <th scope="col" data="">Nombre</th>
                            <th scope="col" data="league_name">Liga</th>
                            <th scope="col" data="name">Deporte</th>
                            <th scope="col" data="name">Equipo</th>
                            <th scope="col" data="material">Material</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td>
                                Campo Benito Juarez
                            </td>
                            <td>
                                Liga del Valle de Mexico
                            </td>
                            <td>
                                N/A
                            </td>
                            <td>
                                Duela
                            </td>
                            <td>
                                Duela
                            </td>
                            <td>
                                <a href="">Ver mapa</a>
                            </td>
                            <td>
                                <button class="btn btn-icon btn-2 btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                </button>
                                <button class="btn btn-icon btn-2 btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection