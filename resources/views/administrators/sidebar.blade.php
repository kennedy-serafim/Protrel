{{-- Accordion Collapse One --}}
<div class="accordion" id="accordionAdministratorsOne">

    {{-- Sales --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-sales" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'SaleMusics' || $elementActive == 'SaleAlbums') ? 'true' : 'false'}}" aria-controls="navbar-sales">
            <i class="icofont-cart-alt"></i>
            <span class="nav-link-text">
                Vendas
            </span>
        </a>

        <div class="collapse {{($elementActive == 'SaleMusics' || $elementActive == 'SaleAlbums') ? 'show' : ''}}" id="navbar-sales" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'SaleMusics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-music-note"></i>
                        Musicas
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'SaleAlbums' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-music-disk"></i>
                        Álbuns
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Registers --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-registers" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'RegisterAdministrators' || $elementActive == 'RegisterMusicians' || $elementActive == 'RegisterClients') ? 'true' : 'false'}}" aria-controls="navbar-registers">
            <i class="icofont-contact-add"></i>
            <span class="nav-link-text">
                Cadastros
            </span>
        </a>

        <div class="collapse {{($elementActive == 'RegisterAdministrators' || $elementActive == 'RegisterMusicians' || $elementActive == 'RegisterClients') ? 'show' : ''}}" id="navbar-registers" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'RegisterAdministrators' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="fas fa-id-card-alt"></i>
                        Administradores
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'RegisterMusicians' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-microphone-alt"></i>
                        Músicos
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'RegisterClients' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-users-social"></i>
                        Clientes
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Approvals --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-approvals" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'ApprovalMusics' || $elementActive == 'ApprovalAlbums' || $elementActive == 'ApprovalLyrics') ? 'true' : 'false'}}" aria-controls="navbar-approvals">
            <i class="fas fa-retweet"></i>
            <span class="nav-link-text">
                Pedidos
            </span>
        </a>

        <div class="collapse {{($elementActive == 'ApprovalMusics' || $elementActive == 'ApprovalAlbums' || $elementActive == 'ApprovalLyrics' || $elementActive == 'ApprovalMusicians') ? 'show' : ''}}" id="navbar-approvals" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ApprovalMusics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-ui-music-player"></i>
                        Aprovação de Músicas
                    </a>
                </li>

                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ApprovalMusicians' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-microphone-alt"></i>
                        Aprovação de Músicos
                    </a>
                </li>

                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ApprovalAlbums' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-retro-music-disk"></i>
                        Aprovação de Álbuns
                    </a>
                </li>

                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ApprovalLyrics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-music-notes"></i>
                        Aprovação de Letras
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Complaints --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-complaints" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'ComplaintMusics' || $elementActive == 'ComplaintLyrics' || $elementActive == 'ComplaintAlbums') ? 'true' : 'false'}}" aria-controls="navbar-complaints">
            <i class="icofont-cop"></i>
            <span class="nav-link-text">
                Denuncias
            </span>
        </a>

        <div class="collapse {{($elementActive == 'ComplaintMusics' || $elementActive == 'ComplaintLyrics' || $elementActive == 'ComplaintAlbums') ? 'show' : ''}}" id="navbar-complaints" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ComplaintMusics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-ui-music-player"></i>
                        Músicas
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ComplaintLyrics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-retro-music-disk"></i>
                        Letras
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ComplaintAlbums' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-music-notes"></i>
                        Álbuns
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Musicians --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-musicians" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'MusicianList' || $elementActive == 'MusicianAlbums' || $elementActive == 'MusicianMusics' || $elementActive == 'MusicianLyrics') ? 'true' : 'false'}}" aria-controls="navbar-musicians">
            <i class="icofont-microphone-alt"></i>
            <span class="nav-link-text">
                Músicos
            </span>
        </a>

        <div class="collapse {{($elementActive == 'MusicianList' || $elementActive == 'MusicianAlbums' || $elementActive == 'MusicianMusics' || $elementActive == 'MusicianLyrics') ? 'show' : ''}}" id="navbar-musicians" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'MusicianList' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-id"></i>
                        Registados
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'MusicianAlbums' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-music-disk"></i>
                        Álbuns
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'MusicianMusics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-radio-mic"></i>
                        Músicas
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'MusicianLyrics' ? ' nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-ui-music-player"></i>
                        Letras
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- Reports --}}
    <li class="nav-item">
        <a class="nav-link " href="#navbar-reports" data-toggle="collapse" role="button" aria-expanded="{{($elementActive == 'ReportComplaint' || $elementActive == 'ReportSale') ? 'true' : 'false'}}" aria-controls="navbar-reports">
            <i class="icofont-chart-bar-graph"></i>
            <span class="nav-link-text">
                Relatórios
            </span>
        </a>

        <div class="collapse {{($elementActive == 'ReportComplaint' || $elementActive == 'ReportSale') ? 'show' : ''}}" id="navbar-reports" data-parent='#accordionAdministratorsOne'>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ReportSale' ? 'nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-opencart"></i>
                        Vendas
                    </a>
                </li>
                <li class="nav-item hvr-underline-from-center">
                    <a class="nav-link {{$elementActive == 'ReportComplaint' ? 'nav-active text-white' : ''}}" href="javascript:void(0)">
                        <i class="icofont-cop-badge"></i>
                        Denuncias
                    </a>
                </li>
            </ul>
        </div>
    </li>
</div>