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
        soy team_administrator
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