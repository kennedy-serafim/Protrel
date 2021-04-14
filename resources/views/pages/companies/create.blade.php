@extends('layouts.app',[
'elementActive'=>'Companies',
'dashboard'=>''
])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center justify-content-between">
                            <h3 class="mb-0 ml-2">
                                Companhias
                            </h3>

                            @role('Administrador')
                            <a href="{{ route('companies.index') }}" class="btn btn-sm btn-outline-primary">Lista</a>
                            @endrole
                        </div>
                    </div>

                    <div class="card-body">
                        <h6 class="heading-small text-muted">
                            <button class="btn btn-primary btn-sm ml-2 mb-2" type="button" disabled>
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                <span class="sr-only">Loading...</span>
                              </button>
                          Cadastrar Companhias
                        </h6>

                        <hr class='mt-1 mb-3' />

                        <form action="{{ route('companies.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="companyName" class="form-control-label">Nome da Companhia</label>
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-ui-user"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name='name' value="{{old('name')}}" id='companyName' placeholder="Nome da companhia" type="text">
                                        </div>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="companyNuit" class="form-control-label">NUIT da Companhia</label>
                                    <div class="form-group {{ $errors->has('nuit') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-ui-user"></i>
                                                </span>
                                            </div>
                                            <input
                                                class="form-control f-nuit {{ $errors->has('nuit') ? ' is-invalid' : '' }}"
                                                name='nuit' value="{{old('nuit')}}" id='companyNuit' placeholder="Nuit da companhia" type="text">
                                        </div>

                                        @if ($errors->has('nuit'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('nuit') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class='row'>
                                {{-- Email --}}
                                <div class='col-lg-6'>
                                    <label class="form-control-label" for="companyEmail">Endereço Eletrónico</label>
                                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-email"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name='email' value="{{old('email')}}" id='companyEmail' placeholder="E-mail..." type="email">
                                        </div>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class='col-lg-6'>
                                    <label class="form-control-label" for="companyPhone">Telefone</label>
                                    <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    +258
                                                </span>
                                            </div>
                                            <input
                                                class="form-control f-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name='phone' value="{{old('phone')}}" id='companyPhone' placeholder="Telefone..." type="text">
                                        </div>

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="companyManager" class="form-control-label">Responsável da Empresa</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-email"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" name='manager' value="{{old('name')}}" id='companyManager'
                                                placeholder="Responsável..." type="text" list="companyManagers">
                                        </div>

                                        <datalist id="companyManagers">
                                            {{-- @foreach ($managers as $manager)
                                                <option>{{ $manager->firstname . ' ' . $manager->lastname }}</option>
                                            @endforeach --}}
                                        </datalist>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="companyAddress" class="form-control-label">Endereço da Empresa</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="address" value="{{old('address')}}" id="companyAddress" cols="30" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            {{-- Buttons --}}
                            <div class='row justify-content-center'>
                                <div class="form-group mr-2">
                                    <button type="submit" id="comp aniesFormBtn" class="btn primary-color text-white">
                                        <i class="far fa-check-circle"></i>
                                        Cadastrar
                                    </button>
                                </div>

                                <div class="form-group">
                                    <button type="button" id="btnCancelCompanyCollapse" class="btn secondary-color"
                                        wire:click='hideCollapse'>
                                        <i class="far fa-times-circle"></i>
                                        Cancelar
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
