<nav class="navbar flex-column flex-sm-row navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">
      <img src="{{asset('storage/imagens/logo.png')}}" id="logo">
    </a>       
    <div class="collapse navbar-collapse justify-content-end" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto flex-column flex-sm-row">
          <li class="nav-item active flex-sm-fill">
            <a class="nav-link" href="/sobre" style="font-weight: bold">Sobre</a>
          </li>
          <li class="nav-item active flex-sm-fill">
            <a class="nav-link" href="/funcionalidades" style="font-weight: bold">Funcionalidades</a>
          </li>
          <li class="nav-item active flex-sm-fill">
            <a class="nav-link" href="/suporte" style="font-weight: bold">Suporte</a>
          </li>
        </ul>
        <a href="{{route('register')}}">
            <button class="btn btn-outline-primary my-2 my-sm-0" id = "botao-de-cadastro" type="submit">Cadastrar</button>
        </a>
        <a href="{{route('login')}}">
          <button class="btn btn-primary my-2 my-sm-0" id = "botao-de-login" type="submit">Entrar</button>
        </a>
    </div>
</nav>    
