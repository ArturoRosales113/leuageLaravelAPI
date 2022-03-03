@extends('layouts.app')

@section('content')

@include('users.partials.arbitros')

<div class="container-fluid mb-5">
            <div class="card shadow mt-5">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">Partidos programados</h3>
                        </div>
                    </div>
                </div>


                <div class="itemsJornadasa row justify-content-around">
                @foreach (Auth::user()->referee->games as $lg)
                    <div class="itemsJornada-arbitro col-12 col-md-6 col-lg-5 mb-4">

                                
                                <div class="programas">

                                    <div class="row align-items-center mt-4 top-games">
                                        @foreach ($lg->teams as $lgt)
                                        
                                            <div class="col-4 text-center pd1">
                                                
                                                    <img width="50px" alt="Image placeholder" src="{{ $lgt->icon_path == null ? asset('argon/img/theme/team-4-800x800.jpg') :asset( $lgt->icon_path) }}"> <br>
                                                    <small>{{ $lgt->name }}</small>                                        
                                             
                                            </div>
                                        
                                        <span class="versusTeams">{{ $loop->first ? ' vs ' : '' }}</span>
                                        @endforeach
                                    </div>

                                    <div class="details-car">
                                        <div class="col-12 pdItem" style="text-align: center;">
                                        <h5 class="yellow">Estadio/Cancha</h5>
                                            {{ $lg->field->location->name . ' // ' .  $lg->field->name }}
                                        </div>
                                        <div class="col-12 pdItem" style="text-align: center;">
                                            <h5 class="yellow">Fecha</h5>
                                            {{ Carbon::parse($lg->start_time)->toDayDateTimeString(); }} 
                                        </div>


                                        <div class="botones_encentros">
                                            <!--
                                                <a class="btn btn-sm btn-default redBtn btnFull" href="http://3.16.161.92/score/#/{{ $lg->id }}" target="_blank" class="btn btn-icon btn-2 btn-primary">
                                                Arbitrar
                                            </a>
                                        -->
                                            <a class="btn btn-sm btn-default redBtn btnFull" href="http://playmate.playmakerleagues.com.mx/#/{{ $lg->id }}" target="_blank" class="btn btn-icon btn-2 btn-primary">
                                                Arbitrar
                                            </a>
                                        </div>
                                    </div>

                                </div>
                               
                    </div>
                @endforeach
            </div>

</div>


@endsection