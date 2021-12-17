@extends('layouts.app')

@section('content')

    @include('users.partials.stadium')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Mi Campos</h3>
                    </div>

  
                    <div class="col text-right">
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
                            <th scope="col" data="">Nombre</th>
                            <th scope="col" data="league_name">Estadio</th>
                            <th scope="col" data="material">Material</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fields as $f)
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td>
                               {{ $f->name }}
                            </td>
                            <td>
                                {{  $f->location->display_name }}
                            </td>
                            <td>
                                {{ $f->material->display_name }}
                            </td>
                            <td>
                                @if ($f->lat != null && $f->long !=null)
                                <a href="">Ver mapa</a>
                                @endif
                            </td>
                            <td>
                            <a href="{{ route('fields.edit', $f->id ) }}" class="btn btn-icon btn-2 btn-primary">
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

        <div class="card col-6 mt-4">
            <div class="card-body">
                <div class="col">
                    <h5>Materiales</h5>
                    <a href="{{ route('materials.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>&nbsp;Crear Material</a>
                    <a href="{{ route('materials.index') }}" class="btn btn-sm btn-info"><i class="fas fa-list-ol"></i>&nbsp;Listar todos los materiales</a>
                </div>
            </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection