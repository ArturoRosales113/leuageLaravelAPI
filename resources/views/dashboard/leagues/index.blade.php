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
                        <h3 class="mb-0">Mis Ligas</h3>
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
                            <th scope="col">Liga</th>
                            <th scope="col">No de equios</th>
                            <th scope="col">Ganados</th>
                            <th scope="col">Perdidos</th>
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
                            <td scope="row">
                                Lakers
                            </td>
                            <td>
                                11
                            </td>
                            <td>
                                11
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Power Rangers
                            </td>
                            <td>
                                3,985
                            </td>
                            <td>
                                319
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Black Storm
                            </td>
                            <td>
                                3,513
                            </td>
                            <td>
                                294
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td scope="row">
                                Powe Rangeres
                            </td>
                            <td>
                                2,050
                            </td>
                            <td>
                                147
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <th scope="row">
                                Achiutla
                            </th>
                            <td>
                                1,795
                            </td>
                            <td>
                                190
                            </td>
                            <td>
                                15
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection