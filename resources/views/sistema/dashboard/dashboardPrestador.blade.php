@extends('sistema.layout.layoutDash')
@section('title','Home | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
    <p id="subtitulo-da-pagina">Os serviços que selecionamos para você!</p>
    </div>

    <div class="d-flex justify-content-center mb-4"> <!-- Adjusted margin for spacing -->
        <a id="link-sem-sublinhado">
            <div class="card text-center mx-4"> <!-- Adjusted mx-4 for spacing -->
                <img src="{{asset('storage/imagens/clientePadrao.png')}}" id="img-card">
                <p class="h5" id="card-descricao-destaque">Nome do Cliente</p>
                <p id="card-descricao-texto-simples">Descrição do serviço</p>
                <p class="h5" id="card-descricao-destaque">Valor:</p>
                <a href="/descricaoPedido">
                    <button class="btn btn-secondary" id="botaozin-padrao"> <!-- Adjusted button style -->
                        <i class="bi bi-hand-index">
                            <img src="{{asset('storage/imagens/click.svg')}}" />
                        </i>   
                        Clique para ver mais...
                    </button>
                </a>
            </div>
        </a>
        
        <!-- You can add more similar card elements here -->
        
    </div>
@endsection