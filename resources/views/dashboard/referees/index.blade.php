@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
        <div class="card shadow mt-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Referees</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{ route('referees.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear referee</a>
                        <a href="{{ route('refereeTypes.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear tipo de referee</a>

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
                            <th scope="col" data="name">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" data="edad">Edad</th>
                            <th scope="col" data="peso">Peso</th>
                            <th scope="col" data="estatura">Estatura</th>
                            <th scope="col">Deporte</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($referees as $rf)
                        <tr>
                            <th>
                                <span class="rounded-circle border-b avatar">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                </span>
                            </th>
                            <td>
                                {{ $rf->user->name }}
                            </td>

                            <td>
                                

                            <td>
                                {{ $rf->edad }}
                            </td>
                            <td>
                                {{ $rf->peso . ' kg' }}
                            </td>
                            <td>
                                {{ $rf->estatura . ' cm'}}
                            </td>
                            <td>
                                
                            </td>
                              <td>
                            <a href="{{ route('referees.edit', $rf->id ) }}" class="btn btn-icon btn-2 btn-primary">
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