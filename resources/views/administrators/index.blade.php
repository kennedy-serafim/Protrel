@extends('layouts.app',[
'elementActive' => 'RegisterAdministrators',
'dashboard'=>'Administradores'
])

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12">
            <div class=" card bg-secondary shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">Administradores</h3>
                    </div>
                </div>

                <div class="card-body">
                    <button class="btn secondary-color text-white" data-toggle="collapse" href="#newAdministratorCollapse" role="button" aria-expanded="false" aria-controls="newAdministratorCollapse">
                        <i class="icofont-contact-add"></i>
                        Novo
                    </button>

                    <div class='row mt-3 mb-1'>
                        <div class='col-lg-11 mx-auto'>
                            <div class="collapse" id="newAdministratorCollapse">
                                <div class="card card-body">
                                    @livewire('administrators.create')
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class='my-2' />

                    @livewire('administrators.table-search')

                </div>

            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection