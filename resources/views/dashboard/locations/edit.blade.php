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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('locations.update', $location->id) }}" class="pl-5 pr-5">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre Locación</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $location->name) }}" placeholder="ej. Basketball" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Liga" class="col-sm-3 col-form-label">Selecciona una liga</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                                        <option selected value="0">Selecciona una opción</option>
                                        @foreach ($leagues as $l)
                                            <option  {{ old('league_id') == $l->id || $location->league_id == $l->id ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>t
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                            	<label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la locación">{{ old('description', $location->description) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Image_perfil" class="col-sm-3 col-form-label">Cargar foto de locación</label>
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
                                    <input type="text" class="form-control" name="address" value="{{ old('address',$location->address) }}" placeholder="Dirección completa" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="City" class="col-sm-3 col-form-label">Ciudad</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" value="{{ old('city', $location->city) }}" placeholder="Ciudad" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="State" class="col-sm-3 col-form-label">¿Cuál es tu estado?</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="state" placeholder="Selecciona tu estado">
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="México">México</option>
                                        <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lat" class="col-sm-3 col-form-label">Latitud</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lat" value="{{ old('lat', $location->lat) }}" placeholder="lat" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="long" class="col-sm-3 col-form-label">Longitud</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="long"value="{{ old('long', $location->long) }}" placeholder="long" >
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