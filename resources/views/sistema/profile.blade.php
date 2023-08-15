@extends('sistema.layoutDash')
@section('title','Perfil | Estragou, e agora?')
@section('content')
    <div class="container">
    <img src="{{asset('storage/imagens/person-fill.svg')}}" style="width: 300px; border-radius: 100px" />
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="{{ route('gravaNovoPedido') }}">
        @csrf
            <label for="descricaoPedido">
                <p class="h4" id="card-descricao-valor"><b>{{ Auth::user()->name }}</b></p>
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
        </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function($)){
       $('#valor').mask('R$ 999,99');
    }
</script>

@endsection
