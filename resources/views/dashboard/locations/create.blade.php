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
                                <h3 class="mb-0">Locación</h3>
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('sports.store') }}" class="pl-5 pr-5">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre Locación</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ej. Basketball" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Liga" class="col-sm-3 col-form-label">Selecciona una liga</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="league_name" placeholder="Selecciona una liga dueña del estadio">
                                        <option> </option>
                                        <option> </option>
                                        <option> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la locación">
                                    	{{ old('description') }}
                                    	</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Image_perfil" class="col-sm-3 col-form-label">Cargar foto de deporte</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="img_path">
                                    <label class="custom-file-label" for="customFile">Cargar Imagen</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Portada" class="col-sm-3 col-form-label">Cargar Icono</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="icon_path">
                                    <label class="custom-file-label" for="customFile">Subir icono</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Address" class="col-sm-3 col-form-label">Dirección</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" value="" placeholder="Dirección completa" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-3 col-form-label">Ciudad</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" value="" placeholder="Ciudad" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="State" class="col-sm-3 col-form-label">¿Cuál es tu estado?</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="state" placeholder="Selecciona tu estado">
                                        <option>Aguascalientes</option>
                                        <option>Baja California</option>
                                        <option>Baja California Sur</option>
                                        <option>Campeche</option>
                                        <option>Coahuila de Zaragoza</option>
                                        <option>Colima</option>
                                        <option>Chiapas</option>
                                        <option>Chihuahua</option>
                                        <option>Distrito Federal</option>
                                        <option>Durango</option>
                                        <option>Guanajuato</option>
                                        <option>Guerrero</option>
                                        <option>Hidalgo</option>
                                        <option>Jalisco</option>
                                        <option>México</option>
                                        <option>Michoacán de Ocampo</option>
                                        <option>Morelos</option>
                                        <option>Nayarit</option>
                                        <option>Nuevo León</option>
                                        <option>Oaxaca</option>
                                        <option>Puebla</option>
                                        <option>Querétaro</option>
                                        <option>Quintana Roo</option>
                                        <option>San Luis Potosí</option>
                                        <option>Sinaloa</option>
                                        <option>Sonora</option>
                                        <option>Tabasco</option>
                                        <option>Tamaulipas</option>
                                        <option>Tlaxcala</option>
                                        <option>Veracruz de Ignacio de la Llave</option>
                                        <option>Yucatán</option>
                                        <option>Zacatecas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-sm-3 col-form-label">Ciudad</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" value="" placeholder="Ciudad" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lat" class="col-sm-3 col-form-label">Latitud</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lat" value="" placeholder="Ciudad" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="long" class="col-sm-3 col-form-label">Longitud</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="long" value="" placeholder="Ciudad" >
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