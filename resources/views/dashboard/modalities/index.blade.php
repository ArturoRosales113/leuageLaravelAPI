@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-5">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mis modalidades</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('modalities.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear modalidad de juego</a>
                        <a href="{{ route('home') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
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
                            <th scope="col" data="name">Nombre</th>
                            <th scope="col" data="description">Descripción</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modalities as $m)
                        <tr>
                            <th>
                                <span class="avatar-rectangle">
                                    <img alt="Image placeholder" src="{{ $m->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $m->icon_path) }}">
                                </span>
                            </th>
                            <td>
                                {{ $m->display_name }}
                            </td>
                            <td>
                                {{ $m->description }}
                            </td>
                              <td>
                            <a href="{{ route('modalities.edit', $m->id ) }}" class="btn btn-icon btn-2 btn-primary">
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