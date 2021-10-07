@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    <div class="header bg-gradient-primary image-user pt-5 pl-5 pt-md-8 pb-md-8">
        &nbsp;
    </div>

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Ligas</h3>
                            </div>
                        </div>
                    </div>

                    <form class="pl-5 pr-5">
                        <div class="form-group row">
                            <label for="league" class="col-sm-3 col-form-label">Nombre de la liga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="league" placeholder="ej. Basketball" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email del presidente</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" placeholder="usuario@email.com" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Descripción</label>
                            <div class="col-sm-9">
                                <textarea name="textarea" rows="5" cols="79" placeholder="Escribe la descripción de la liga"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Logo de la liga</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="n-teams" class="col-sm-3 col-form-label">No. de quipos</label>
                              <div class="col-sm-9">
                                <select class="custom-select">
                                  <option selected>Selecciona una opción</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                          <label for="sport" class="col-sm-3 col-form-label">Elige un deporte</label>
                              <div class="col-sm-9">
                                <select class="custom-select">
                                  <option selected>Selecciona una opción</option>
                                  <option value="1">Futbol</option>
                                  <option value="2">Basquetbol</option>
                                  <option value="3">Tenis</option>
                                  <option value="4">Fut 7</option>
                                  <option value="5">Futbol rápido</option>
                                </select>
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
                            <label for="cover" class="col-sm-3 col-form-label">Cargar portada</label>
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