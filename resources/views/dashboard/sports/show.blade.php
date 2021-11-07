@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => $sport->display_name,
    'description' => $sport->description,
    'class' => 'col-lg-12',
    'portada' => $sport->img_path
    ])     

    <div class="container-fluid mt--7">
      
        @include('layouts.footers.auth')
    </div>
@endsection