@extends('sistema.layout.layoutDash')

@section('title','Pedido | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina"><b>Ajuda</b></p>
    <p id="subtitulo-da-pagina">Preencha o formulário abaixo:</p>
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="{{ route('gravaNovoPedido') }}">
        @csrf
            <div class="form-group"> <!-- Adicione esta div -->
                <label for="descricaoPedido" class="h4 label-align" style="margin-left: 10px; margin-right: 30px;">Descrição:</label>
                <p id="card-descricao-label-subtitulo" >Descreva a sua dúvida</p>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="text" class="form-control" name="descricaoPedido" required autocomplete="descricaoPedido" style="border-radius: 40px; background-color: #EFF2FB">
                </div>
            </div> <!-- Encerre a div -->
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
