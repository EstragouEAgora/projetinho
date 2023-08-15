@extends('sistema.layoutDash')
@section('title','Home | Estragou, e agora?')
@section('content')
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Os serviços que selecionamos para você!</p>

        <div style="d-flex mb-3">
            <a id="link-sem-sublinhado">
                <div id="prestador-card" class="card" >
                    <img src="{{asset('storage/imagens/clientePadrao.png')}}" id="img-card">
                    <p id="card-descricao-destaque"><b>Nome do Cliente<b></p>
                    <p id="card-descricao-texto-simples">*Descrição do serviço</p>
                    <p id="card-descricao-destaque"><b>Valor:<b></p>
                    <a href="/descricaoPedido">
                        <button id="botaozin-padrao"> 
                        <i class="bi bi-hand-index">
                            <img src="{{asset('storage/imagens/click.svg')}}" />
                        </i>   
                             Clique para ver mais...
                        </button>
                    </a>
                </div>
            </a>
        </div>
@endsection
