@extends('layouts.app', [
'title' => __('User Profile'),
'elementActive' => 'Profile',
'dashboard'=>'Meu Perfil'
])

@section('content')
@include('users.partials.header', [
'title' => 'Olá, '. auth()->user()->name,
'description' => "Essa é a sua página de configurações pessoais. Aqui pode alterar e visualizar os dados vinculado a sua
conta",
'class' => 'col-lg-7'
])

<div class="container-fluid mt--7">
    <div class="row">

        {{-- Card a direita --}}
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image rounded-circle">
                            <a href="#">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5 mt-7">
                                <div>
                                    <span class="heading">22</span>
                                    <span class="description">Notificações</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <h3>
                            {{ auth()->user()->name }}
                            <span class="font-weight-light">, {{ auth()->user()->id }}</span>
                        </h3>
                        <div class="h5 font-weight-300">
                            <i class="fas fa-map-marker-alt"></i>
                            Maputo, Moçambique
                        </div>
                        <hr class="my-4" />
                        <a href="javascript:void(0)" class="btn">Mais...</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card a esquerda --}}
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">

                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">Editar o perfil</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">Informações do usuário</h6>

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">
                                    <i class="fas fa-user-edit"></i>
                                    Gravar
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr class="my-4" />

                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                        @if (session('password_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('password_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-current-password">Senha actual</label>
                                <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha actual...') }}" required>

                                @if ($errors->has('old_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-password">
                                    Nova senha
                                </label>
                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Nova senha..." required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">
                                    Confirmar a nova senha
                                </label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirmar a nova senha" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">
                                    <i class="fas fa-user-edit"></i>
                                    Atualizar senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection
