@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hola') . ' '. auth()->user()->name,
        'description' => __('Esta es tu página de perfil.'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
      
        @include('layouts.footers.auth')
    </div>
@endsection