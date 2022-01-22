@extends('layouts.app')

@section('content')


    @include('users.partials.leagues')

<div class="container-fluid">
    <div class="row mt-4">
        @foreach ($tournament->actions->whereNotIn('name',['Rebote','Asistencia','Robo'])->groupBy('name') as $actions=>$action)
            <div class="col-6 mb-4">
                <div class="card">

                    <div class="card-header">
                        <h2 class="text-white">{{ $actions }}</h2>
                    </div>
                    <div class="card-body">                        
                        @foreach ($action->groupBy('player_id') as $player=>$act)
                        <div class="row">
                            <div class="col">
                                {{ $tournament->league->players->find($player)->user->name }}
                            </div>
                            <div class="col">
                                {{ count($act) }}
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