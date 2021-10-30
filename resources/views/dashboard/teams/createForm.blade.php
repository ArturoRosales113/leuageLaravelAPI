<form method="POST" enctype="multipart/form-data" action="{{ route('teams.store') }}" class="pl-5 pr-5">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-3 col-form-label">Nombre del equipo</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-3 col-form-label">Nombre del Capitán</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="captain_name" value="{{ old('user_id') }}"  placeholder="" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email del capitán</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="usuario@email.com" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Liga" class="col-sm-3 col-form-label">Selecciona una liga</label>
                                <div class="col-sm-9">                                  
                                    @isset($leagues)
                                    <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                                        <option selected value="0">Selecciona una opción</option>
                                        @foreach ($leagues as $l)
                                            <option  {{ old('league_id') == $l->id ? 'selected' : '' }} value="{{ $l->id }}">{{ $l->name }}</option>t
                                        @endforeach
                                    </select>
                                    @endisset
                                    @isset($individualLeague)
                                    <select class="form-control" name="league_id" placeholder="Selecciona una liga">
                                        <option  value="{{ $individualLeague->id }}" selected>{{ $individualLeague->name }}</option>t
                                    </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Description" class="col-sm-3 col-form-label">Descripción</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción del equipo">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Img_path" class="col-sm-3 col-form-label">Cargar Portada</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="img_path">
                                    <label class="custom-file-label" for="customFile">Cargar Imagen</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Icon_path" class="col-sm-3 col-form-label">Cargar escudo del equipo</label>
                                <div class="col-sm-8 ml-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="icon_path">
                                    <label class="custom-file-label" for="customFile">Subir icono</label>
                                </div>
                            </div>

                            <!-- Este es para crear el Usuario dueño del equipo -->

                            
                            <button class="btn btn-primary" type="submit">Guardar</button>                        
                        </form>