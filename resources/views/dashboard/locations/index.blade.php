@extends('layouts.app')

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
    @include('layouts.headers.userhead')
        
    <div class="row">
        <div class="col-12">
            <div class="card shadow mt-7">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Mis estadios</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('locations.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear estadio</a>
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
                                <th scope="col" data="name">Canchas</th>
                                <th scope="col" data="league_name">Liga</th>
                                <th scope="col" data="name">Deporte</th>
                                <th scope="col" data="state">Estado</th>
                                <th scope="col" data="city">Ciudad</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $lo)
                            <tr>
                                <th>
                                <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                    </span>
                                </th>
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
                                    {{ $lo->league->sport->display_name }}
                                </td>
                                <td>
                                    {{ $lo->state }}
                                </td>
                                <td>
                                    {{ $lo->city }}
                                </td>
                                <td>
                                    @if ($lo->lat != null && $lo->long !=null)
                                    <a href="">Ver mapa</a>
                                    @endif
                                </td>
                                  <td>
                                    <a href="{{ route('locations.edit', $lo->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
        
                                    <form method="POST" class="d-inline-block" action="{{ route('locations.delete', $lo->id) }}">
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
                            <h3 class="mb-0">Mis materiales de cancha</h3>
                        </div>
                        <div class="col text-right">
                             <a href="{{ route('materials.create') }}" class="btn btn-sm btn-default"><i class="fas fa-plus"></i>&nbsp;Crear material</a>
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
    </div>

        


        @include('layouts.footers.auth')
    </div>
@endsection