@extends('layouts.login', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container pb-5">
        <div class="row justify-content-end">
            <div class="row-r">
                <div class="box-login">
                    {{-- <div class="card-header bg-transparent pb-1">
                        <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">Playmaker</span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">Playmaker</span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div> --}}
                    <div class="pdr">
                        <div class="text-center text-white mb-4">
                            <small>
                                    BIENVENIDO
                                    {{-- <br> --}}
                                    {{-- Username <strong>admin@argon.com</strong> Password: <strong>secret</strong> --}}
                            </small>
                        </div>
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-alternative">
                                    <input class="f-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@argon.com" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-alternative">
                                    <input class="f-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="secret" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-white">{{ __('Recordar datos') }}</span>
                                </label>
                            </div>

                            <div class="buttons-login">
                                <div class="buttons-items">
                                    <button type="submit" class="btn-white my-4">{{ __('Iniciar Sesión') }}</button>
                                </div>

                                <div class="buttons-items">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-light">
                                            <small>{{ __('Recuperar mi contraseña') }}</small>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div className="imagePml">
                
        </div>



    </div>


    

@endsection
