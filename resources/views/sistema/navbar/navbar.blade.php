<nav class="navbar fixed-top" style="background-color: #3C5BBF">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <div style="display: inline-block;">
                <img src="{{ asset('storage/imagens/logo.png') }}" id="logo-dash">
            </div>
        </a>
        <div class="d-flex justify-content-end align-items-center" style="">
            <div>
                <i class="bi bi-bell" style="margin-right: 20px">
                    <img src="{{ asset('storage/imagens/bell.svg') }}" />
                </i>
            </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation" style="border: none; margin-right: 13px">
                    <span class="navbar-toggle">
                        <img src="/storage/{{ Auth::User()->fotoPerfil }}"
                            style="width: 40px; border-radius: 100px; " />
                    </span>
                </button>
            </div>
            <div style="margin-right: 24px;">
                <p style="color: white; font-size: 20px; cursor: pointer;" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar"><b>{{ Auth::user()->apelido }}</b></p>
                <p style="color: white; font-size: 15px; margin-top: -20px; cursor: pointer;" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</nav>




<div class="offcanvas offcanvas-end text-bg-white" style="background-color: #3C5BBF" tabindex="-1"
    id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel" style="color: white; font-size: 25px;"><b>Estragou, e
                agora?</b></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <div>
                <p style="color: white; font-size: 20px"><b>{{ Auth::user()->name }}</b></p>
                <p style="color: white; font-size: 15px">{{ Auth::user()->email }}
                <p>
            </div>
            <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                <a class="nav-link" href="/home" id="navbar-topicos-nome">
                    <i class="bi bi-house">
                        <img src="{{ asset('storage/imagens/house.svg') }}" />
                    </i>
                    Home
                </a>
            </li>
            @if (Auth::user()->tipo != 3)
                <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                    <a class="nav-link" href="{{ route('listagemPedidos') }}" id="navbar-topicos-nome">
                        <i class="bi bi-list-ul">
                            <img src="{{ asset('storage/imagens/pedidos.svg') }}" />
                        </i>
                        Pedidos
                    </a>
                </li>
            @endif
            @if (Auth::user()->tipo == 1)
                <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                    <a class="nav-link" href="{{ route('avaliaCliente') }}" id="navbar-topicos-nome">
                        <i class="bi bi-house">
                            <img src="{{ asset('storage/imagens/star_avaliacao.svg') }}" />
                        </i>
                        Avaliação
                    </a>
                </li>
                <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                    <a class="nav-link" href="/dashboard/suporte" id="navbar-topicos-nome">
                        <i class="bi bi-headset">
                            <img src="{{ asset('storage/imagens/headset.svg') }}" />
                        </i>
                        Suporte
                    </a>
                </li>
                <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                    <a class="nav-link" href="/dashboard/funcionalidades" id="navbar-topicos-nome">
                        <i class="bi bi-link-45deg">
                            <img src="{{ asset('storage/imagens/link.svg') }}" />
                        </i>
                        Funcionalidades
                    </a>
                </li>
            @endif
            <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                <a class="nav-link" href="/dashboard/perfil" id="navbar-topicos-nome">
                    <i class="bi bi-gear">
                        <img src="{{ asset('storage/imagens/profile.svg') }}" />
                    </i>
                    Perfil
                </a>
            </li>
            <li class="nav-item active flex-sm-fill" id="navbar-topicos">
                <a class="nav-link" href="{{ route('logout') }}" id="navbar-topicos-nome"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right">
                        <img src="{{ asset('storage/imagens/logout.svg') }}" />
                    </i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
</div>
</nav>
