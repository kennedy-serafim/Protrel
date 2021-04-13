@extends('layouts.app',[
'elementActive' => 'Dashboard',
'dashboard'=>'Dashboard'
])

@section('content')
    <div class="header pb-8 pt-5 pt-md-8 secondary-gradient-color">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-3"></span>

        <div class="container-fluid">
            <div class="header-body">
                @role('Administrador')
                @include('pages.administrators.card')
                @endrole
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @include('layouts.footers.auth')
    </div>



@endsection
