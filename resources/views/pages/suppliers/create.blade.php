@extends('layouts.app',[
'elementActive'=>'Suppliers',
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
                                Fornecedores de Produtos
                            </h3>

                            <a href="{{ route('suppliers.index') }}" class="btn btn-sm btn-outline-primary">
                                <i class="icofont-justify-all"></i>
                                Lista
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <strong class="heading-small text-muted">Cadastrar Fornecedores de Produtos</strong>
                            <div class="spinner-border ml-auto d-none loader" role="status" aria-hidden="true"></div>
                        </div>

                        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alertSuppliers">
                            <span class="message"></span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <hr class='mt-1 mb-3' />

                        <form action="{{ route('suppliers.store') }}" method="POST" id="suppliersFormCreate">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="supplierName" class="form-control-label">Nome da Loja</label>
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-ui-user"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name='name' value="{{ old('name') }}" id='supplierName'
                                                placeholder="Nome da loja" type="text">
                                        </div>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="supplierPhone" class="form-control-label">Telefone</label>
                                    <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    258
                                                </span>
                                            </div>
                                            <input
                                                class="form-control f-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                name='phone' value="{{ old('phone') }}" id='supplierPhone'
                                                placeholder="Número de Telefone..." type="text">
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
                                    <label for="supplierEmail" class="form-control-label">Endereço Eletrónico</label>
                                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-email"></i>
                                                </span>
                                            </div>
                                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name='email' value="{{ old('email') }}" id='supplierEmail'
                                                placeholder="Endereço Eletrónico" type="email">
                                        </div>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="supplierLink" class="form-control-label">Site</label>
                                    <div class="form-group {{ $errors->has('link') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icofont-web"></i>
                                                </span>
                                            </div>
                                            <input
                                                class="form-control f-phone {{ $errors->has('link') ? ' is-invalid' : '' }}"
                                                name='link' value="{{ old('link') }}" id='supplierlink'
                                                placeholder="Ex: http://www.example.com" type="url">
                                        </div>

                                        @if ($errors->has('link'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="supplierAddress" class="form-control-label">Endereço da Loja</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="address" value="{{ old('address') }}" id="supplierAddress"
                                                cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="supplierTags" class="form-control-label">Tipo de Produtos</label>

                                    <div class="form-group">
                                        <select class="form-control js-example-basic-multiple" name="tags[]"
                                            multiple="multiple">
                                            @foreach ($productTags as $productTag)
                                                <option value="{{ $productTag->name }}">
                                                    {{ $productTag->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tags'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('tags') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class='row justify-content-center'>
                                <div class="form-group mr-2">
                                    <button type="submit" id="suppliersFormBtn" class="btn primary-color text-white">
                                        <i class="far fa-check-circle"></i>
                                        Cadastrar
                                    </button>
                                </div>

                                <div class="form-group">
                                    <button type="button" id="suppliersFormBtnCancel" class="btn secondary-color">
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
