@extends('layouts.app')

@section('content')

    @include('users.partials.stadium')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Mis estadios</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('locations.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear estadio</a>
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
                                <th scope="col" data="name">Canchas</th>
                                <th scope="col" data="league_name">Liga</th>
                                <!--<th scope="col" data="name">Deporte</th>-->
                                <th scope="col" data="state">Estado</th>
                                <th scope="col" data="city">Status</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($locations as $lo)
                                <tr>
                                    <th>
                                        <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ $lo->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lo->icon_path) }}">
                                        </span>
                                    </th>
                                    <td>
                                        <a href="{{ route('locations.show', $lo->id) }}">
                                            {{ $lo->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('locations.show', $lo->id) }}">
                                            {{ $lo->display_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $lo->fields->count() }}
                                    </td>
                                    <td>
                                        {{ $lo->league->name }}
                                    </td>

                                    <td>
                                        {{ $lo->state }} <br/>
                                        {{ $lo->city }}
                                    </td>
                                    <td>
                                        <span class="estatus">{{ $lo->is_active ? 'Activo' : 'Inactivo' }}</span>
                                    </td>
                                    <td>                                    
                                        {{$lo->tipo_estadio}}                                     
                                    </td>
                                    <td>
                                        <a href="{{ route('locations.edit', $lo->id) }}" class="btn btn-icon btn-2 btn-primary">
                                            <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                        </a>
                                        
                                        <form method="POST" class="d-inline-block" action="{{ route('locations.active', $lo->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}
                                            <div class="form-group">
                                                <button class="btn btn-icon btn-2 {{ $lo->is_active ? 'btn-warning' : 'btn-success' }}" type="submit">
                                                    <span class="btn-inner--icon"><i class=" {{ $lo->is_active ? 'fas fa-ban' : 'fas fa-check' }}"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                        @hasanyrole('super-admin')
                                        <form method="POST" class="d-inline-block" action="{{ route('locations.delete', $lo->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    
                                            <div class="form-group">
                                                <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                        @endhasanyrole
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $locations->onEachSide(5)->links() }}
        </div>

        @hasanyrole('super-admin')


        <div class="col-10">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Mis materiales de cancha</h3>
                        </div>
                        <div class="col text-right">
                            
                            @hasanyrole('super-admin')
                                <a href="{{ route('materials.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear material</a>
                            @endhasanyrole
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
                                <th scope="col" data="name">Tipo</th>
                                <th scope="col" data="description">Descripción</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $m)
                            <tr>
                                <th>
                                    <span class="rounded-circle border-b avatar">
                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                    </span>
                                </th>
                                <td>
                                    {{ $m->display_name }}
                                </td>
                                <td>
                                    {{ $m->description }}
                                </td>
                                <td>                               
                                    <a href="{{ route('materials.edit', $m->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>        
                                    <form method="POST" class="d-inline-block" action="{{ route('materials.delete', $m->id) }}">
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
        @endhasanyrole
    </div>

        


        @include('layouts.footers.auth')
    </div>
@endsection