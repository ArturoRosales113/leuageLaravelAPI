@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    <div class="header bg-gradient-primary image-user pt-5 pl-5 pt-md-8 pb-md-8">
        &nbsp;
    </div>

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Deportes</h3>
                            </div>
                        </div>
                    </div>

                    <form class="pl-5 pr-5">
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Nombre del Deporte</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" placeholder="ej. Basketball" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="textarea" rows="5" cols="79" placeholder="Escribe la descripción del deporte"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Cargar foto de deporte</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar foto de deporte</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Cargar reglamento</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Subir documento</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Cargar portada</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Seleccionar imagen</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>                        
                    </form>



                </div>
            </div>
        </div>
            @include('layouts.footers.auth')
        </div>

    </div>
@endsection