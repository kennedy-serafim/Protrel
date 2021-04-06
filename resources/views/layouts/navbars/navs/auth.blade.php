<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">

        <!-- Brand -->

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase bg-transparent d-none d-lg-flex">
                <li class="breadcrumb-item {{ $dashboard == 'Dashboard' ? 'd-none' : 'd-block'}}">
                    <a href="{{ route('home') }}" class='text-white'>Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $dashboard ?? 'Dashboard' }}</li>
            </ol>
        </nav>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link px-0" href="javascript:void(0)" data-turbolinks="false" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">
                            </span>
                        </div>
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
    </div>
</nav>
