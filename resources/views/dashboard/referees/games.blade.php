@extends('layouts.app')

@section('content')

    @include('users.partials.leagues')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Juegos</h3>
                        </div>
                        
                
        
                        <div class="col text-right">
                            {{-- <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalJuego">
                                Crear Juego
                            </button> --}}
                        </div>
                    </div>
                </div>    
                <div class="table-responsive scrollbar-light-blue">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    &nbsp;
                                </th>
                                <th scope="col">Equipos</th>
                                <th scope="col">Estadio/Cancha</th>
                                <th scope="col">Fecha</th>

                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->referee->games as $lg)
                            <tr>
                                <th>
                                    {{-- <span class="avatar-rectangle">
                                        <img alt="Image placeholder" src="{{ $t->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $t->icon_path) }}">
                                    </span> --}}
                                </th>
                                <td scope="row">    
                                    @foreach ($lg->teams as $lgt)
                                    <a href="{{ route('teams.show', $lgt->id) }}" class="text-default text-underline">
                                        {{ $lgt->name }}
                                    </a>
                                    {{ $loop->first ? ' vs ' : '' }}
                                    @endforeach
                                </td>
                                <td>
                                   {{ $lg->field->location->name . '//' .  $lg->field->name }}
                                </td>
                                <td>
                                    {{ Carbon::parse($lg->start_time)->diffForHumans(); }}
                                </td>
                                <td>
                                     <a href="http://3.16.161.92/score/#/{{ $lg->id }}" target="_blank" class="btn btn-icon btn-2 btn-primary">
                                        <span class="btn-inner--icon"><i class="fas fa-mobile"></i>&nbsp;Arbitrar</span>
                                    </a>
                                    {{-- <form method="POST" class="d-inline-block" action="{{ route('games.delete', $lg->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                
                                        <div class="form-group">
                                            <button class="btn btn-icon btn-2 btn-danger" type="submit">
                                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                            </button>
                                        </div>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection