@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Materiales</h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('materials.store') }}" class="pl-5 pr-5">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre del Material</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ej. Caucho" >
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del material">
                                    	{{ old('description') }}
                                    	</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Img_path" class="col-sm-3 col-form-label">Cargar foto de material</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="img_path">
                                    <label class="custom-file-label" for="customFile">Cargar Imagen</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Icon_path" class="col-sm-3 col-form-label">Cargar Icono</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="icon_path">
                                    <label class="custom-file-label" for="customFile">Subir icono</label>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
    </div>
@endsection