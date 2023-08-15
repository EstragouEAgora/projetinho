@extends('sistema.layoutDash')
@section('title','Pedido | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>Descrição do Pedido</b></p>
    <div class="card" id="card-descricao-servico">
            <p class="h4" style="font-size: 18px; margin-left: 10px">Descrição do serviço:</p>
            <p>AAAAAA</p>
            <p class="h4" id="card-descricao-label"><b>Valor(R$):</b></p>
            <div id="card-descricao-valor">
            <input id="dinheiro" type="text" name="dinheiro">
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="botaozin-padrao">
                    <a id="link-sem-sublinhado" href="/home">Cancelar</a>
                </button>
                <a href="">
                    <button type="button" id="botaozin-aceito">
                            Aceitar serviço
                    </button>
                </a>
            </div>
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function($){
       $('#dinheiro').maskMoney();
    });
</script>
@endsection
