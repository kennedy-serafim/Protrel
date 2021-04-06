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
                        <i class="fas fa-drum"></i>
                        {{ config('app.name','ACS Team') }}
                    </a>
                </h1>
            </div>

            <div class="col-12 col-md-10 d-none d-lg-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="javascript:void(0)" class="nav-link">Pesquisas Populares</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Musicas</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Álbuns</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Letras</a></li>
                        <li><a href="javascript:void(0)" class="nav-link">Entrar</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-6 d-inline-block d-lg-none ml-md-0 py-3" style="position: relative; top: 3px;">

                <a href="#" class="burger site-menu-toggle js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>

        </div>
    </div>

</header>