<!-- ======= Footer ======= -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h3>Acerca da {{ config('app.name', 'Wimbo') }}</h3>
                <p class='text-justify {{ $textColor ?? 'text-grey' }}'>
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

            <div class="col-4">
                <h3>Navegação</h3>
                <ul class="list-unstyled">
                    <li><a href="javascript:void(0)" class="nav-link">Perguntas Frequentes</a></li>
                    <li><a href="javascript:void(0)" class="nav-link">Serviços</a></li>
                    <li><a href="javascript:void(0)" class="nav-link">Sobre nós</a></li>
                    <li><a href="javascript:void(0)" class="nav-link">Contactar</a></li>
                    <li><a href="javascript:void(0)" class="nav-link">Entrar</a></li>
                </ul>
            </div>

            <div class="col-4">
                <h3>Serviços</h3>
                <ul class="list-unstyled">
                    <li><a href="javascript:void(0)">Serviço I</a></li>
                    <li><a href="javascript:void(0)">Serviço II</a></li>
                    <li><a href="javascript:void(0)">Serviço III</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="row justify-content-center text-center">
        <div class="col-md-7">
            &copy; {{ now()->year }}
            <a href="javascript:void(0)" class="font-weight-bold ml-1 {{ $color ?? '' }} ">
                {{ config('app.name', 'M&A Mapinduzi') }}.
            </a>
            {{ __('All Rights Reserved') }}<br />

            <div class="credits">
                {{ __('Designed By') }}
                <a href="https://github.com/kennedy-serafim" target="_blank"
                    class="font-weight-bold ml-1 {{ $color ?? '' }} ">
                    {{ config('app.owner', 'M&A Mapinduzi') }}.
                </a>
            </div>
        </div>
    </div>

</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
