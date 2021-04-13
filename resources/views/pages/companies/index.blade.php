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
                            <a href="{{ route('companies.create') }}" class="btn btn-sm btn-outline-primary">Registar</a>
                            @endrole
                        </div>
                    </div>

                    <div class="card-body">
                        @include('pages.companies.table')
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')

    </div>
@endsection
