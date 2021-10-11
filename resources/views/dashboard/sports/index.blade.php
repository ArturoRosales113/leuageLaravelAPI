@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis deportes</h3>
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
                            <th scope="col">
                                &nbsp;
                            </th>
                            <th scope="col">Deporte</th>
                            <th scope="col">Ligas</th>
                            <th scope="col">Jugadores</th>
                            <th scope="col">Usuarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Basquetbol
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                5
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Basquetbol
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                5
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Basquetbol
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                5
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Basquetbol
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                5
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Basquetbol
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                111
                            </td>
                            <td>
                                5
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection