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
                        <div class="row ">
                            <h3 class="mb-0 ml-2">
                                Fornecedores de Produtos
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-outline-info">
                            <i class="fas fa-plus-circle"></i>
                            Registar
                        </a>
                        @include('pages.suppliers.table')
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')

    </div>
@endsection
