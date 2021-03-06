@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Eventos dentro de juegos</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary">Crear nuevo</a>
                                                <a href="{{ route('fields.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear campo</a>

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
                            <th scope="col" data="name">Evento</th>
                            <th scope="col" data="sport_id">Deporte</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $ev)
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td>
                                {{ $ev->display_name }}
                            </td>
                            <td>
                                {{ $ev->sport->display_name }}
                            </td>
                            <td>
                                <a href="{{ route('events.edit', $ev->id) }}" class="btn btn-icon btn-2 btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                </a>
                                <button class="btn btn-icon btn-2 btn-danger" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                </button>
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