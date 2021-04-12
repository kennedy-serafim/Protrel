<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">

    <div class="container-fluid">

        <!-- Brand -->
        <div class="d-none d-md-flex justify-content-between">
            <a href="javascript:void(0)" class="text-white ">
                <i class="icofont-home"></i>
                {{ Auth()->user()->employee->company->name }}
            </a>
        </div>

        <a href="javascript:void(0)" class="ml-3 text-white">
            <i class="fas fa-bell mr-1"></i>
        </a>
         <!-- User -->
         <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item">
                <a class="nav-link pr-0">
                    <i class="fas fa-bell mr-3"></i>
                </a>
            </li>

            <li class="nav-item dropdown" data-turbolinks="false">
                <a class="nav-link px-0" href="" data-turbolinks="false" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            @if(config('app.env') != 'local')
<img
                                src="https://avatars.abstractapi.com/v1/?api_key=8f4d247c8af345aab346b1ec15591377&name={{auth()->user()->employee->firstname.' '.auth()->user()->employee->lastname}}&background_color=18a5e7&font_color=ffffff"
                            />
                            @endif

                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">
                                {{ Auth()->user()->employee->firstname.' '.Auth()->user()->employee->lastname }}
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