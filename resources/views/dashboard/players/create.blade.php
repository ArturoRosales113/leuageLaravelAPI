@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

    @include('users.partials.head')

    <div class="container-fluid">
        @include('layouts.headers.userhead')
        
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow pb-5">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Registrar Jugador</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" enctype="multipart/form-data" action="" class="pl-5 pr-5">
                        <div class="form-group row">
                            <label for="user_id" class="col-sm-3 col-form-label">Nombre del Jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}" id="player" placeholder="" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email del jugador</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Email" name="email" value="{{ old('email') }}" placeholder="usuario@email.com" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="perfil" class="col-sm-3 col-form-label">Foto de Perfil</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="icon_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img_path" class="col-sm-3 col-form-label">Foto de Portada</label>
                            <div class="col-sm-8 ml-3">
                                <input type="file" class="custom-file-input" name="img_path" id="customFile">
                                <label class="custom-file-label" for="customFile">Cargar imagen</label>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="Numero" class="col-sm-3 col-form-label">No. de quipos</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="numero">
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
                                  <option value="31">31</option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                          <label for="edad" class="col-sm-3 col-form-label">Elige la edad</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="edad">
                                  <option selected>Selecciona una opción</option>
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
                                  <option value="31">31</option>
                                  <option value="32">32</option>
                                  <option value="33">33</option>
                                  <option value="34">34</option>
                                  <option value="35">35</option>
                                  <option value="36">36</option>
                                  <option value="37">37</option>
                                  <option value="38">38</option>
                                  <option value="39">39</option>
                                  <option value="40">40</option>
                                  <option value="41">41</option>
                                  <option value="42">42</option>
                                  <option value="43">43</option>
                                  <option value="44">44</option>
                                  <option value="45">45</option>
                                  <option value="46">46</option>
                                  <option value="47">47</option>
                                  <option value="48">48</option>
                                  <option value="49">49</option>
                                  <option value="50">50</option>
                                </select>
                              </div>
                        </div>
                        <div class="form-group row">
                            <label for="estatura" class="col-sm-3 col-form-label">Estatura</label>
                            <div class="col-sm-9">
                                <input type="text" name="estatura" class="form-control" placeholder="80.5 cm" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peso" class="col-sm-3 col-form-label">Peso</label>
                            <div class="col-sm-9">
                                <input type="text" name="peso" class="form-control" placeholder="88.10 kg" />
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