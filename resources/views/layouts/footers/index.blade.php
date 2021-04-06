<!-- ======= Footer ======= -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <h3>Acerca do {{ config('app.name','Wimbo') }}</h3>
                <p class='text-justify {{ $textColor ?? 'text-white'}}'>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea
                    delectus pariatur, numquam aperiam dolore nam optio dolorem
                    facilis itaque voluptatum recusandae deleniti minus animi.
                </p>
                <p class="social">
                    <a href="javascript:void(0)"><span class="icofont-twitter"></span></a>
                    <a href="javascript:void(0)"><span class="icofont-facebook"></span></a>
                    <a href="javascript:void(0)"><span class="icofont-whatsapp"></span></a>
                </p>
            </div>

            <div class="col-md-8 ml-auto">
                <div class="row site-section pt-0">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h3>Navegação</h3>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)" class="nav-link">Pesquisas Populares</a></li>
                            <li><a href="javascript:void(0)" class="nav-link">Musicas</a></li>
                            <li><a href="javascript:void(0)" class="nav-link">Álbuns</a></li>
                            <li><a href="javascript:void(0)" class="nav-link">Letras</a></li>
                            <li><a href="javascript:void(0)" class="nav-link">Entrar</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h3>Serviços</h3>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0)">Vendas de músicas</a></li>
                            <li><a href="javascript:void(0)">Decoração de Eventos</a></li>
                            <li><a href="javascript:void(0)">Desenvolvimento de aplicações</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="row justify-content-center text-center">
            <div class="col-md-7">
                &copy; {{ now()->year }}
                <a href="javascript:void(0)" class="font-weight-bold ml-1 {{$color ?? '' }} ">
                    {{ config('app.name', 'Wimbo') }}.
                </a>
                {{ __('All Rights Reserved')}}<br />

                <div class="credits">
                    {{__('Designed By')}}
                    <a href="javascript:void(0)" class="font-weight-bold ml-1 {{$color ?? '' }} ">
                        {{ config('app.owner', '@ACS Team') }}.
                    </a>
                </div>
            </div>
        </div>


    </div>
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>