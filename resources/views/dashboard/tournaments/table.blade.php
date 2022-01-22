@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')

<div class="container-fluid">
    <div class="row py-5 justify-content-center">
        <div class="col-1 text-center">
            <h5>Pos</h5>
        </div>
        <div class="col-2 text-left">
            <h5>Nombre</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Jugados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Ganados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Empatados</h5>
        </div>
        <div class="col text-center">
            <h5>Partidos Perdidos</h5>
        </div>
        <div class="col text-center">
            <h5>Puntos a favor</h5>
        </div>
        <div class="col text-center">
            <h5>Puntos a en contra</h5>
        </div>
    </div>
    @foreach ($tournament->positions as $tp)
        <div class="row py-5 justify-content-center">
            <div class="col-1 text-center">
                {{ $loop->iteration }}
            </div>
            <div class="col-2 text-left">
                {{ $tp->name }}
                @if ($loop->iteration <= $tournament->number_teams_playoffs)
                <br>
                <span class="badge badge-success text-white">En play offs</span>
                @endif
                </div>
            <div class="col text-center">
                {{ $tp->pivot->jugados }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->ganados }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->empates }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->perdidos }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->puntos_favor }}
            </div>
            <div class="col text-center">
                {{ $tp->pivot->puntos_contra }}
            </div>
        </div>
        @if (!$loop->last)
            <hr class="bg-white">
        @endif
    @endforeach
</div>


    @endsection