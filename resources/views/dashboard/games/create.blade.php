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
                                <h3 class="mb-0">Crear Juegos</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" enctype="multipart/form-data" action="" class="pl-5 pr-5">
                        <div class="form-group row">
                            <label for="modality_id" class="col-sm-3 col-form-label">Modalidad</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="modality_id" value="{{ old('modality_id') }}" id="modality_id" placeholder="ej. Basketball" >
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="league_id" class="col-sm-3 col-form-label">Selecciona una liga</label>
                              <div class="col-sm-9">
                                <select class="custom-select" name="league_id">
                                  <option selected>Selecciona una opción</option>
                                  <option></option>
                                  <option></option>
                                  <option></option>
                                </select>
                              </div>
                        </div>
                            <div class="form-group row">
                                <label for="field_id" class="col-sm-3 col-form-label">Selecciona una Campo</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="field_id">
                                        <option selected>Selecciona una opción</option>
                                        <option></option>
                                        <option></option>
                                        <option></option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="referee_id" class="col-sm-3 col-form-label">Selecciona un arbitro</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" name="referee_id">
                                    <option selected>Selecciona una opción</option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="referee_id" class="col-sm-3 col-form-label">Asignar arbitros</label>
                                <div class="col-sm-9">
                                  <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Default checkbox
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Default checkbox
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Default checkbox
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Default checkbox
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="referee_id[]" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Default checkbox
                                    </label>
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