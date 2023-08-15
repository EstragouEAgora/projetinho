@extends('sistema.layoutDash')
@section('title','Pedido | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>Solicitar Serviço</b></p>
    <p id="subtitulo-da-pagina">Faça seu pedido de serviço preenchendo o formulário abaixo.</p>
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="{{ route('gravaNovoPedido') }}">
        @csrf
            <label for="descricaoPedido">
                <p class="h4" id="card-descricao-valor">Descrição do serviço:</p>
                <p id="card-descricao-label-subtitulo">Descreva o serviço que você procura detalhadamente</p>
            </label>
            <div style="margin-left: 10px; margin-right: 30px;">
                <input type="text" class="form-control" name="descricaoPedido" required autocomplete="descricaoPedido" style="border-radius: 40px; background-color: #EFF2FB">
            </div>
            
            <label for="valorPedido">
            <p class="h4" id="card-descricao-valor">Valor:</p>
            <p id="card-descricao-label-subtitulo">Valor sugerido</p>
            </label>
            <div id="card-descricao-valor">
                <input id="valorPedido" type="text" class="form-control valor" name="valor" required autocomplete="valorPedido" style="border-radius: 40px; background-color: #EFF2FB">
            </div>
            <div style="display: flex; justify-content: flex-end">
                <button id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white"href="/home">Cancelar</a>
                    
                </button>
                <button id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white">Enviar Pedido</a>
                </button>
            </div>
    </b></p>
@endsection

@section('javascript')
<script>
    $(document).ready(function($)){
       $('#valor').mask('R$ 999,99');
    }
</script>

@endsection
