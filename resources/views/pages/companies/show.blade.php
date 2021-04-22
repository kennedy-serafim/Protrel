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
                            <a href="{{ route('companies.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="icofont-justify-all"></i>
                                Lista
                            </a>
                            @endrole
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span>Detalhes da companhia
                                <strong class="heading-small text-muted">
                                    {{ $company->name }}
                                </strong>
                            </span>
                            <div class="spinner-border ml-auto d-none loader" role="status" aria-hidden="true"></div>
                        </div>

                        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alertCompanies">
                            <span class="message"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <hr class='mt-1 mb-3' />

                        <form method="POST" id="companiesFormShow">
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
                                                name='name' value="{{ $company->name }}" readonly id='companyName'
                                                placeholder="Nome da companhia" type="text">
                                        </div>

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
                                                name='nuit' value="{{ $company->nuit }}" readonly id='companyNuit'
                                                placeholder="Nuit da companhia" type="text">
                                        </div>
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
                                                name='email' value="{{ $company->email }}" readonly id='companyEmail'
                                                placeholder="E-mail..." type="email">
                                        </div>

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
                                                name='phone' value="{{ $company->phone }}" readonly id='companyPhone'
                                                type="text">
                                        </div>
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
                                            <input class="form-control" name='manager' value="{{ $company->manager }}"
                                                readonly id='companyManager' placeholder="Não Especificado" type="text"
                                                list="companyManagers">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="companyAddress" class="form-control-label">Endereço da Empresa</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="address" value="{{ $company->address }}" readonly
                                                id="companyAddress" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class='row justify-content-center'>
                                <a href="{{ route('companies.update', [$company->id]) }}"
                                    class="btn primary-color text-white">
                                    <i class="far fa-check-circle"></i>
                                    Actualizar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')

    </div>
@endsection
