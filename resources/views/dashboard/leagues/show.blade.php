@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => $league->name,
'description' => $league->description,
'class' => 'col-lg-12'
])   

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Equipos</h3>
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
                                <th scope="col">
                                    &nbsp;
                                </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Jugadores</th>
                                <th scope="col">Capitan</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->teams as $t)
                            <tr>
                                <th>
                                    <span class="rounded-circle border-b avatar">
                                        <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $t->icon_path) }}">
                                    </span>
                                </th>
                                <td scope="row">
                                    <a href="{{ route('teams.show', $t->id) }}" class="text-default text-underline">
                                        {{ $t -> name }}
                                    </a>
                                </td>
                                <td>
                                   {{ $t->league->name }}
                                </td>
                                <td>
                                    {{ $t->players->count() }}
                                </td>
                                <td>
                                    {{ $t->players->where('is_captain', '=' ,1)->first()->user->name }}
                                </td>
                                <td>
                                    <a href="{{ route('teams.edit', $t->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
        
                                    <form method="POST" class="d-inline-block" action="{{ route('teams.delete', $t->id) }}">
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
    <div class="row">
        <div class="col-4">
            <form method="POST" enctype="multipart/form-data" action="" class="pl-5 pr-5">
                <div class="form-group row">
                    <label for="modality_id" class="col-sm-3 col-form-label">Modalidad</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="modality_id" value="{{ old('modality_id') }}" id="modality_id" placeholder="ej. Basketball" >
                    </div>
                </div>
                <div class="form-group row">
                  <label for="league_id" class="col-sm-3 col-form-label">Selecciona una liga</label>
                      <div class="col-sm-9">
                        <select class="custom-select" name="league_id">
                          <option selected>Selecciona una opción</option>
                          <option></option>
                          <option></option>
                          <option></option>
                        </select>
                      </div>
                </div>
                    <div class="form-group row">
                        <label for="field_id" class="col-sm-3 col-form-label">Selecciona una Campo</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="field_id">
                                <option value="{{ $league->id }}" selected>{{ $league->name }}</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="referee_id" class="col-sm-3 col-form-label">Selecciona un arbitro</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="referee_id">
                            <option selected>Selecciona una opción</option>
                            <option></option>
                            <option></option>
                            <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="referee_id" class="col-sm-3 col-form-label">Asignar arbitros</label>
                        <div class="col-sm-9">
                          <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Default checkbox
                            </label>
                            <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Default checkbox
                            </label>
                            <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Default checkbox
                            </label>
                            <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Default checkbox
                            </label>
                            <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Default checkbox
                            </label>
                        </div>
                    </div>



                <button class="btn btn-primary" type="submit">Guardar</button>                        
            </form>
        </div>
        <div class="col-8">
            <div class="card shadow mt-4">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Juegos</h3>
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
                                <th scope="col">
                                    &nbsp;
                                </th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Liga</th>
                                <th scope="col">Jugadores</th>
                                <th scope="col">Capitan</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($league->teams as $t)
                            <tr>
                                <th>
                                    <span class="rounded-circle border-b avatar">
                                        <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $t->icon_path) }}">
                                    </span>
                                </th>
                                <td scope="row">
                                    <a href="{{ route('teams.show', $t->id) }}" class="text-default text-underline">
                                        {{ $t -> name }}
                                    </a>
                                </td>
                                <td>
                                   {{ $t->league->name }}
                                </td>
                                <td>
                                    {{ $t->players->count() }}
                                </td>
                                <td>
                                    {{ $t->players->where('is_captain', '=' ,1)->first()->user->name }}
                                </td>
                                <td>
                                    <a href="{{ route('teams.edit', $t->id) }}" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                    </a>
        
                                    <form method="POST" class="d-inline-block" action="{{ route('teams.delete', $t->id) }}">
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