@extends('layouts.app',[
'elementActive' => 'Dashboard',
'dashboard'=>'Dashboard'
])

@section('content')
@include('layouts.headers.cards')

{{-- --}}
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">

        </div>

        <div class="col-xl-4">

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">

        </div>

        <div class="col-xl-4">

        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection
