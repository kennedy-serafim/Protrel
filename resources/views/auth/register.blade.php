@extends('layouts.app', ['class' => 'hero-section'])

@section('content')
@include('layouts.headers.guest')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">

        <div class="container">
            <div class="row">
                <div class="col-12 hero-text-image">
                    <div class="row">
                        <div class="col-lg-7 text-center text-lg-left">
                            <h1 data-aos="fade-right">VENDA E COMPRE CONNOSCO</h1>
                            <p class="mb-5" data-aos="fade-right" data-aos-delay="100">
                                100% MÚSICA MOÇAMBICANA
                            </p>
                            <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500">
                                <a href="javascript:void(0)" class="btn btn-outline-white">
                                    <i class="icofont-music-disk"></i>
                                    COMPRAR
                                </a>
                            </p>
                        </div>
                        <div class="col-lg-5 ">
                            <div class="nav-wrapper" data-aos="fade-right" data-aos-delay="100">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-musicians-tab" data-toggle="tab" href="#tabs-musicians" role="tab" aria-controls="tabs-musicians" aria-selected="true">
                                            <i class="icofont-microphone-alt"></i>
                                            Músicos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-users-tab" data-toggle="tab" href="#tabs-users" role="tab" aria-controls="tabs-users" aria-selected="false">
                                            <i class="icofont-ui-music-player"></i>
                                            Usuários
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card shadow border-0" data-aos="fade-left" data-aos-delay="200">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-musicians" role="tabpanel" aria-labelledby="tabs-musicians-tab">
                                            @livewire('musicians.create-musicians')
                                        </div>
                                        <div class="tab-pane fade" id="tabs-users" role="tabpanel" aria-labelledby="tabs-users-tab">
                                            @livewire('clients.create-clients')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.index',[
'textColor'=>'text-dark'
])

@endsection
