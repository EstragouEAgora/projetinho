@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 150px"><b>Editar pedido</b></p>
        <p id="subtitulo-da-pagina">Edite seu pedido</p>
        <div class="card" id="card-descricao-servico">
            <form method="POST" action="/pedidos/update/{{ $dados['id'] }}" enctype="multipart/form-data">
                @csrf
                <label for="descricaoPedido" id="card-descricao-valor">
                    <p class="h5" style="margin-left: 10px;margin-top: 20px;margin-top: 20px;">Descrição:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">

                    <textarea class="form-control @error('descricaoPedido') is-invalid @enderror" name="descricaoPedido" required
                        autocomplete="descricaoPedido" style="border-radius: 20px; background-color: #EFF2FB;">{{ $dados['descricaoPedido'] }}</textarea>
                    @error('descricaoPedido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="endereco" id="card-descricao-valor">
                    <p class="h5" style="margin-left: 10px;margin-top: 20px;margin-top: 20px;">Endereço a ser realizado:
                    </p>
                    <p id="card-descricao-label-subtitulo">Ex.: R. Estragou e agora, 687, B. Estragou, casa.</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco"
                        required autocomplete="endereco" style="border-radius: 40px; background-color: #EFF2FB"
                        value="{{ $dados['endereco'] }}">
                    @error('endereco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @if ($dados->fotoPedido != '')
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="profile-container">
                            <label for="arquivo">
                                <img src="/storage/{{ $dados->fotoPedido }}" class="profile-image"
                                    onmouseout="hideEditText(this)" />
                                <div class="edit-button" style="width: 100%; heigth: 100%">Editar a foto do pedido
                                    <input id="arquivo" type="file" class="form-control" name="arquivo">
                                </div>
                            </label>
                        </div>
                    </div>
                @else
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
                @endif

                <div class="form-group">
                    <label for="valorPedido" class="h5"
                        style="margin-left: 15px;margin-top: 20px;margin-top: 20px;">Valor (R$):</label>
                    <p id="card-descricao-label-subtitulo"style="margin-left: 15px">Digite nesse formato: 99.90</p>
                    <div id="card-descricao-valor">
                        <input id="valorPedido" type="text" class="form-control valor" name="valorPedido"
                            autocomplete="valorPedido" style="border-radius: 40px; background-color: #EFF2FB"
                            value="{{ $dados['valorPedido'] }}">
                    </div>
                </div>


                <div style="display: flex; justify-content: flex-end">
                    <button id="botaozin-padrao">
                        <a id="botaozin-padrao" style="margin-left: 10px; text-decoration: none"
                            href="/dashboard/pedidos">Cancelar</a>

                    </button>
                    <button id="botaozin-padrao">
                        <a id="botaozin-padrao" style="margin-left: 10px">Cadastrar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function($)) {
            $('#valor').mask('R$ 999,99');
        }
    </script>

@endsection
