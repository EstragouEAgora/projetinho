@extends('sistema.layout.layoutDash')
@section('title', 'Candidatos | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Candidatos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista dos candidatos que se disponibilizaram e o preço que eles ofertaram</p>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <img class="h5 card-icon" src="/storage/{{ $candidato->fotoPerfil }}">
                        <p class="h5 card-title">
                            <span style="color: #3c5bbf; font-weight: bold;">{{ $candidato->apelido }}</span>
                        </p>
                        <p class="card-text"><b>Telefone:</b>{{ $candidato->telefone }}</p>
                    </div>
                    <a href="">
                        <button class="btn btn-secondary" id="botaozin-padrao">Salvar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

