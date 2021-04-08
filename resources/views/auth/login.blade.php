@extends('layouts.app', [
'class' => '',
'elementActive' => 'SignIn',
'dashboard'=>'Registo'
])

@section('content')
<!-- ======= Hero Section ======= -->
<section class="hero-section" id="hero">
    <div class="wave">
        <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                    <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
                </g>
            </g>
        </svg>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 hero-text-image">
                <div class="row">
                    <div class="col-lg-5 text-center text-lg-left">
                        <h1 data-aos="fade-right">Terceirize o Seu Negocio</h1>
                        <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                            Pessoal 100% Especializado
                        </p>
                    </div>

                    <div class="col-lg-7 iphone-wrap">
                        <div class="row justify-content-center">

                            <div>
                                <div class="card bg-secondary shadow border-1">

                                    {{-- Body --}}
                                    <div class="card-body px-lg-5 py-lg-2">
                                        <div class="text-center text-muted mb-4">
                                            <small>
                                                Preencha as suas credências para continuar no sistema
                                            </small>

                                            <hr class='mt-2' />
                                        </div>
                                        <form role="form" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                                <label class='form-control-label'>E-mail</label>

                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Endereço Electronico" type="email" name="email" value="{{ old('email') }}" autofocus>
                                                </div>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                <label class='form-control-label'>Senha</label>

                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password">
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
                                                    <span class="text-muted">{{ __('Manter conectado') }}</span>
                                                </label>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn text-white primary-color my-4">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                    Continuar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-light">
                                            <small>{{ __('Forgot password?') }}</small>
                                        </a>
                                        @endif
                                    </div>

                                    <div class="col-6 text-right">
                                        <a href="{{ route('register') }}" class="text-light">
                                            <small>{{ __('Create new account') }}</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @include('layouts.footers.guest',[
                'color'=>'text-primary-color'
                ])
            </div>

        </div>
    </div>

</section>

@endsection
