@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => $location->name,
'description' => $location->liga,
'class' => 'col-lg-12'
])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-4">
            <div class="card shadow pb-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Registrar Cancha</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                @include('dashboard.fields.createForm', ['individualLocation' => $location])
            </div>
        </div>
        <div class="col-8">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Canchas</h3>
                        </div>
                        <div class="col text-right">
                            
                            
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
                                <th scope="col" data="">Nombre</th>
                                <th scope="col" data="league_name">Estadio</th>
                                <th scope="col" data="material">Material</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($location->fields as $f)
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
                                    <a href="{{ route('fields.edit', $f->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
        
                                    <form method="POST" class="d-inline-block" action="{{ route('fields.delete', $f->id) }}">
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