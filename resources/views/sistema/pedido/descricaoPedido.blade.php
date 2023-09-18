@extends('sistema.layout.layoutDash')
@section('title','Pedidos | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>Descrição do Pedido</b></p>
    <p id="subtitulo-da-pagina">Aqui está a descrição do serviço solicitado pelo cliente para você! Sinta-se à vontade para ajustar o campo de valor de acordo com o preço do serviço que você irá oferecer.</p>
    <div class="card" id="card-descricao-servico">
        <p class="h4" style="font-size: 18px; margin-left: 10px">Descrição do serviço:</p>
            <p class="h4" style="font-size: 18px; margin-left: 10px">Tipo de serviço: {{$dados->servico['nomeServico']}}</p>
            <p style="font-size: 18px; margin-left: 10px">{{$dados['descricaoPedido']}}</p>
            <p class="h4" id="card-descricao-label"><b>Valor (R$):</b></p>
        <div id="card-descricao-valor">
            <input id="dinheiro" type="text" name="dinheiro" class="form-control" style="border-radius: 40px; background-color: #EFF2FB" value="{{$dados['valor'])}}">
        
            </div>
            <div style="display: flex; justify-content: flex-end;">
                <button type="button" id="botaozin-padrao">
                    <a id="botaozin-padrao" href="/home">Cancelar</a>
                </button>
                <a href="">
                    <button type="button" id="botaozin-padrao">
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
