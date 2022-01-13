@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.leagues')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-8">
            <div class="col">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Crear Torneo</h3>
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

                    <form method="POST" enctype="multipart/form-data" action="{{ route('tournaments.store') }}" class="pl-5 pr-5">
                        @csrf
                        <div class="form-group row">
                            <label for="league" class="col-sm-3 col-form-label">Nombre del torneo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="league" placeholder="Torneo flash" >
                            </div>
                        </div>

               

                        @hasanyrole('super-admin')
                        <div class="form-group row">
                          <label for="sport" class="col-sm-3 col-form-label">Elige una liga</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="league_id">
                                  <option selected value="0">Selecciona una opción</option>
                                  @foreach ($leagues as $l)
                                  <option {{ old('league_id') == $l->id ? 'selected' : ''}} value="{{ $l->id }}">{{ $l->name }}</option>`
                                  @endforeach
                                </select>
                              </div>
                         </div>
                        @endhasanyrole
                    
                        @hasanyrole('league_administrator')
                         <input type="hidden" name="league_id" value="{{ auth()->user()->league->id }}">
                        @endhasanyrole
                        <div class="form-group row">
                            <label for="sport" class="col-sm-3 col-form-label">Elige una Categoría</label>
                                <div class="col-sm-9">
                                  <select class="custom-select" name="category_id">
                                    <option selected value="0">Selecciona una opción</option>
                                    @foreach ($categories as $c)
                                    <option {{ old('category_id') == $c->id ? 'selected' : ''}} value="{{ $c->id }}">{{ ucfirst($c->display_name) }}</option>`
                                    @endforeach
                                  </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="description" rows="5" cols="79" placeholder="Escribe la descripción de la liga">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Logo del toreno</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img_path" class="col-sm-3 col-form-label">Portada del torneo</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="img_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">No. de Equipos</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="number_teams">
                                  <option selected value="0">Selecciona una opción</option>
                    
                                  @for ($i = 1; $i < 41; $i++)
                                  <option {{ old('number_teams') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                    
                                </select>
                              </div>
                        </div>

                        <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">Equipos en play offs</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="number_teams_playoffs">
                                  <option selected value="0">Selecciona una opción</option>
                    
                                  @for ($i = 4; $i < 21; $i= $i+4)
                                  <option {{ old('number_teams_playoffs') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                    
                                </select>
                              </div>
                        </div>

                        <hr class="bg-white">

                        <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">Día de la semana en que se juega</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="gameday">
                                  <option selected value="0">Selecciona una opción</option>            
                                  <option value="Lunes">Lunes</option>            
                                  <option value="Martes">Martes</option>            
                                  <option value="Miércoles">Miércoles</option>            
                                  <option value="Jueves">Jueves</option>            
                                  <option value="Viernes">Viernes</option>            
                                  <option value="Sábado">Sábado</option>            
                                  <option value="Domingo">Domingo</option>                
                                </select>
                              </div>
                        </div>

                        {{-- <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">Horario</label>
                              <div class="col-sm-9">
                                <input type="time" id="appt" name="schedule[]">                                
                                <input type="time" id="appt" name="schedule[]">                                
                                <input type="time" id="appt" name="schedule[]">                                
                             
                              </div>
                        </div> --}}

                        <hr class="bg-white">
                    
                        <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">Periodos por partido</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="number_periods">
                                  <option selected value="0">Selecciona una opción</option>
                    
                                  @for ($i = 1; $i < 6; $i++)
                                  <option {{ old('number_periods') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                  @endfor
                    
                                </select>
                              </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="n-teams" class="col-sm-3 col-form-label">Tiempo por periodo (minutos)</label>
                                <div class="col-sm-9">
                                  <select class="custom-select" name="period_lenght">
                                    <option selected value="0">Selecciona una opción</option>
                      
                                    @for ($i = 1; $i < 31; $i++)
                                    <option {{ old('period_lenght') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                      
                                  </select>
                                </div>
                          </div>

                          <div class="form-group row">
                            <label for="n-teams" class="col-sm-3 col-form-label">Tiempos fuera por periodo (cantidad)</label>
                                <div class="col-sm-9">
                                  <select class="custom-select" name="time_offs">
                                    <option selected value="0">Selecciona una opción</option>
                      
                                    @for ($i = 1; $i < 11; $i++)
                                    <option {{ old('time_offs') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                      
                                  </select>
                                </div>
                          </div>
                          <hr class="bg-white">

                          <div class="form-group row">
                            <label for="n-teams" class="col-sm-3 col-form-label">Tiempos extra por partido</label>
                                <div class="col-sm-9">
                                  <select class="custom-select" name="extra_time_periods">
                                    <option selected value="0">Selecciona una opción</option>
                      
                                    @for ($i = 1; $i < 6; $i++)
                                    <option {{ old('extra_time_periods') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                      
                                  </select>
                                </div>
                          </div>

                        <div class="form-group row">
                            <label for="n-teams" class="col-sm-3 col-form-label">Duración tiempo extra(minutos)</label>
                                <div class="col-sm-9">
                                  <select class="custom-select" name="extra_time">
                                    <option selected value="0">Selecciona una opción</option>
                                    @for ($i = 0; $i < 21; $i++)
                                    <option {{ old('extra_time') == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                      
                                  </select>
                                </div>
                          </div>
                        <hr class="bg-white">
                        
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 col-form-label">Cargar reglamento</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="reglamento_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Subir documento</label>
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