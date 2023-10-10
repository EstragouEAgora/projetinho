@extends('sistema.layout.layoutDash')
@section('title', 'Pedido | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 150px"><b>{{ $dados['nomeServico'] }}</b></p>
    <p id="subtitulo-da-pagina"></p>
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="{{ route('gravaNovoPedido') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="descricaoPedido" class="h4 label-align" style="margin-left: 10px; margin-right: 30px;">Descrição
                    do pedido:</label>
                <p id="card-descricao-label-subtitulo">Descreva o que que você precisa detalhadamente, assim conseguimos os
                    melhores pra você!</p>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <textarea class="form-control @error('descricaoPedido') is-invalid @enderror" name="descricaoPedido" required
                        autocomplete="descricaoPedido" style="border-radius: 20px; background-color: #EFF2FB;">{{ $dados['descricaoPedido'] }}</textarea>
                    @error('descricaoPedido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="endereco" class="h4 label-align"
                        style="margin-left: 10px;margin-top: 20px;margin-top: 20px;">Endereço:</label>
                    <p id="card-descricao-label-subtitulo">Ex.: R. Estragou e agora, 687, B. Estragou, casa.</p>
                    <input type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco"
                        required autocomplete="endereco"
                        style="border-radius: 40px; background-color: #EFF2FB; margin-left: 10px; width: 95%">
                    @error('endereco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="arquivo" id="card-descricao-valor">
                        <label for="endereco" class="h4 label-align" style="margin-top: 20px;">Adicione uma foto
                            (opcional):</label>

                    </label>
                    <div style="margin-left: 10px; margin-right: 30px;">
                        <input type="file" class="form-control" name="arquivo"
                            style="border-radius: 40px; background-color: #EFF2FB">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="valorPedido" class="h4 label-align"
                    style="margin-left: 10px ;margin-right: 30px; margin-top: 20px;">Valor (R$):</label>
                <p id="card-descricao-label-subtitulo">Digite nesse formato: 99.90</p>
                <div id="card-descricao-valor">
                    <input id="valorPedido" type="text" class="form-control valor" name="valorPedido"
                        autocomplete="valorPedido" style="border-radius: 40px; background-color: #EFF2FB"
                        placeholder="99.90">
                </div>
            </div>


            <div style="display: flex; justify-content: flex-end">
                <button id="botaozin-padrao">
                    <a id="botaozin-padrao" style="margin-left: 10px; text-decoration: none" href="/home">Cancelar</a>
                </button>
                <button id="botaozin-padrao">
                    <a id="botaozin-padrao" style="margin-left: 10px  ">Enviar Pedido</a>
                </button>
            </div>
        </form>
    </div>
@endsection
