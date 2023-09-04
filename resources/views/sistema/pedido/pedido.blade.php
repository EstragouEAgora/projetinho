@extends('sistema.layout.layoutDash')
@section('title','Pedido | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>{{$dados['nomeServico']}}</b></p>
    <p id="subtitulo-da-pagina"></p>
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="{{ route('gravaNovoPedido') }}">
        @csrf
            <div class="form-group"> 
                <label for="descricaoPedido" class="h4 label-align" style="margin-left: 10px; margin-right: 30px;">Descrição do pedido:</label>
                <p id="card-descricao-label-subtitulo" ></p>
                <p id="card-descricao-label-subtitulo" >Descreva o que que você precisa detalhadamente, assim conseguimos os melhores pra você!</p>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="text" class="form-control" name="descricaoPedido" required autocomplete="descricaoPedido" style="border-radius: 40px; background-color: #EFF2FB">
                </div>
            </div> 

            <div class="form-group">
                <label for="valorPedido" class="h4 label-align" style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor:</label>
                <p id="card-descricao-label-subtitulo">Valor sugerido</p>
                <div id="card-descricao-valor">
                    <input id="valorPedido" type="text" class="form-control valor" name="valorPedido" required autocomplete="valorPedido" style="border-radius: 40px; background-color: #EFF2FB">
                </div>
            </div> 

            <div style="display: flex; justify-content: flex-end">
                <button id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white" href="/home">Cancelar</a>
                </button>
                <button id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white">Enviar Pedido</a>
                </button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script type="module">
        $().ready(function () {
            let valorPedido = new Inputmask ('R$ 9999.99')
            valorPedido.mask("#valorPedido");
        });
    </script>
@endsection
