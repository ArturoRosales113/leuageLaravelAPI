@extends('layouts.app')

@section('content')

        @include('users.partials.headhome')

    <div class="container-fluid">
    @include('layouts.headers.userhead')

        
        @role('super-admin')
        @include('users.partials.access')

   
    <!--

        <div class="card mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis Ligas Playmakeras</h3>
                    </div>
                </div>
            </div>    
            <div class="table-responsive scrollbar-light-blue">
       
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
                            <th scope="col">Posición</th>
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
                                Liga del Valle de México
                            </td>
                            <td>
                                Basketbol
                            </td>
                            <td>
                                35
                            </td>
                            <td>
                                Activa
                            </td>
                            <td>
                                1
                            </td>
                              <td>
                            <a href="" class="btn btn-icon btn-2 btn-primary">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </a>
                                <button class="btn btn-icon btn-2 btn-danger" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    -->


        
        @endrole
        
        @role('back_office')
        soy super office
        @endrole
        
        @role('league_administrator')
        @include('users.partials.access')
        soy admin
        @endrole
        
        
        @role('captain')
        soy capitan
        @endrole
        
        
        @role('referee')
        soy referee
        @endrole
        
        
        @role('player')
        soy player
        @endrole
        
        @include('layouts.footers.auth')
    </div>
@endsection

{{-- @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush --}}