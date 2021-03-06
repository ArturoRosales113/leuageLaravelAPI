@extends('layouts.app')

@section('content')

    @include('users.partials.arbitros')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
                    
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Arbitro</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('referees.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear arbitro</a>
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
                                    <th scope="col" data="id">ID</th>
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
                                        <img alt="Image placeholder" src="{{ $rf->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $rf->icon_path) }}">    
                                        </span>
                                    </th>
                                    <td>
                                        {{ $rf->id }}
                                    </td>
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
    
                                        <form method="POST" class="d-inline-block" action="{{ route('referees.delete', $rf->id) }}">
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
            </div>
    
            <div class="col-6">
                <div class="card shadow mt-4">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Tipos de arbitro</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('refereeTypes.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear tipo de arbitro</a>
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
                                    <th scope="col" data="name">Tipo</th>
                                    <th scope="col" data="description">Descripción</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($refereeTypes as $rft)
                                <tr>
                                    <th>
                                        <span class="rounded-circle border-b avatar">
                                            <img alt="Image placeholder" src="{{ $rft->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $rft->icon_path) }}">    
                                        
                                        </span>
                                    </th>
                                    <td>
                                        {{ $rft->display_name }}
                                    </td>
                                    <td>
                                        {{ $rft->description }}
                                    </td>
                                      <td>
                                         <a href="{{ route('refereeTypes.edit', $rft->id ) }}" class="btn btn-icon btn-2 btn-primary">
                                            <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                        </a>
    
                                        <form method="POST" class="d-inline-block" action="{{ route('refereeTypes.delete', $rft->id) }}">
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
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection