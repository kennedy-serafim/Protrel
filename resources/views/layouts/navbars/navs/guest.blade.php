<!-- ======= Mobile Menu ======= -->
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<!-- ======= Header ======= -->
<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-lg-2">
                <h1 class="mb-0 site-logo">
                    <a href="{{ url('/') }}" class="mb-0">
                        <i class="icofont-tow-truck"></i>
                        {{ config('app.name', 'M&A Mapinduzi') }}
                    </a>
                </h1>
            </div>

            <div class="col-12 col-md-10 d-none d-lg-block">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="javascript:void(0)" class="nav-link">Perguntas Frequentes</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Serviços</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Sobre nós</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Contactar</a></li>
                        <li class="active"><a href="{{ route('home') }}" class="nav-link">Entrar</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

                <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse"
                    data-target="#main-navbar">
                    <span></span>
                </a>
            </div>

        </div>
    </div>

</header>
