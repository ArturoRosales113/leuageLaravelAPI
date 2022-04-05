@extends('layouts.app')

@section('content')

        @include('users.partials.headhome')

    <div class="container-fluid">
    @include('layouts.headers.userhead')

        
        @role('super-admin')
        @include('users.partials.access')
        
        @endrole
        
        @role('back_office')
        soy super office
        @endrole
        
        @role('league_administrator')
        @include('users.partials.access')
        soy admin
        @endrole
        
        
        @role('captain')
        soy capitan
        @endrole
        
        @role('team_administrator')
        <div class="row py-5">
            <div class="col-12">
                <h1>Torneos </h1>
            </div>
            @foreach (Auth::user()->team->tournaments as $tourn)
            <div class="col-12 col-lg-6">
                <div class="card"\>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 text-center">
                                <img src="{{ asset($tourn->league->icon_path) }}" class="img-fluid " alt="">
                                <h5 class="text-white text-center"><small>Liga</small><br>{{ $tourn->league->name }}  </h5>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-white">{{ $tourn->name }}</h4>
                                <p class="card-text">{{ ucfirst($tourn->category->display_name) }}</p>
                                <p class="card-text">{{ ucfirst($tourn->gameday) }}</p>
                                <p class="card-text">{{ $tourn->positions->find(Auth::user()->team->id)->pivot->ganados }}</p>                                
                                <p class="card-text">{{ $tourn->positions->find(Auth::user()->team->id)->pivot->perdidos }}</p>                             
                            </div>
                        </div>
                        <hr class="bg-white">
                        <a href="{{ route('tournaments.show', $tourn->id ) }}" class="btn btn-block btn-primary">Jornadas</a>
                        <a href="{{ route('tournaments.getTable', $tourn->id ) }}" class="btn btn-block btn-primary">Posiciones</a>
                        <a href="{{ route('tournaments.getTable', $tourn->id ) }}" class="btn btn-block btn-primary">Estadisticas</a>
                        <a href="{{ route('tournaments.getTable', $tourn->id ) }}" class="btn btn-block btn-primary">Oportunidades</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endrole
        
        @role('referee')
        soy referee
        @endrole
        
        
        @role('player')
        soy player
        @endrole
        
        @include('layouts.footers.auth')
    </div>
@endsection

{{-- @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush --}}