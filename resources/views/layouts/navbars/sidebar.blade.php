<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h1 class="my-0 site-logo">
            <a href="{{ url('/') }}" class="mb-0 text-secondary-color">
                <i class="fas fa-drum"></i>
                {{ config('app.name','ACS Team') }}
            </a>
        </h1>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown" data-turbolinks="false">
                <a class="nav-link" href="" data-turbolinks="false" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        </span>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bem Vindo!') }}</h6>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu perfil') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>

                </div>
            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">

                    <div class="col-8 collapse-brand">
                        <h1 class="mb-0 site-logo">
                            <a href="{{ url('/') }}" class="mb-0 text-secondary-color">
                                <i class="fas fa-drum"></i>
                                {{ config('app.name','ACS Team') }}
                            </a>
                        </h1>
                    </div>

                    <div class="col-4 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'Dashboard' ? 'nav-active text-white' : ''}}" href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
            </ul>

            <!-- Navigation -->
            <ul class="navbar-nav">

                @role('Administrators')
                @include('administrators.sidebar')
                @endrole

            </ul>
            <!-- Divider -->
            <hr class="my-1">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Configurações</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link {{$elementActive == 'Profile' ? 'nav-active text-white' : ''}}" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user-cog"></i>
                        Dados Pessoais
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>