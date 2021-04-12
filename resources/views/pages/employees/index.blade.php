@extends('layouts.app',[
'elementActive'=>'Employees',
'dashboard'=>''
])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-2">
                                <i class="fas fa-people-carry"></i>
                                Funcionários
                            </h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <button class="btn primary-color text-white" id="btnCreateEmployeeCollapse" type="button"
                            data-toggle="collapse" data-target="#newEmployeeCollapse" aria-expanded="false"
                            aria-controls="newEmployeeCollapse">
                            <i class="icofont-contact-add"></i>
                            Registar
                        </button>

                        <div class='row mt-3 mb-1'>
                            <div class='col-lg-10 mx-auto'>
                                <div class="collapse" id="newEmployeeCollapse">
                                    <div class="card card-body">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class='my-2' />


                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')

    </div>
@endsection
