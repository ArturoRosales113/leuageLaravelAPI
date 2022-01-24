@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')

<div class="container-fluid mt-5">

<div class="col text-right">
                         <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                    </div>

    <div class="row mt-4">
        @foreach ($tournament->actions->whereNotIn('name',['Falta Técnica', 'Falta Normal', 'Falta Antideportiva'])->groupBy('name') as $actions=>$action)
            <div class="col-6 mb-4">
                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0">{{ $actions }}</h3>
                    </div>
                    <div class="card-body">                        
                        @foreach ($action->groupBy('player_id') as $player=>$act)
                        <div class="row row_stats">
                            <div class="col">
                                {{ $tournament->league->players->find($player)->user->name }}
                            </div>
                            <div class="col center yellow">
                                {{ count($act) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="row mt-2">
        @foreach ($tournament->scores->groupBy('value') as $value=>$score)
            <div class="col-6 mb-4">
                <div class="card">

                    <div class="card-header">
                        <h3 class="mb-0">Mayor encestes de {{ $value }} puntos</h3>
                    </div>
                    <div class="card-body">                        
                        @foreach ($score->groupBy('player_id') as $player=>$scor)
                        <div class="row row_stats">
                            <div class="col">
                                {{ $tournament->league->players->find($player)->user->name }}
                            </div>
                            <div class="col center yellow">
                                {{ count($scor) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>


    @endsection