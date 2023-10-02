@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Editar pedido</b></p>
        <p id="subtitulo-da-pagina">Edite seu pedido</p>
        <div class="card" id="card-descricao-servico">
            <form method="POST" action="/pedidos/update/{{ $dados['id'] }}" enctype="multipart/form-data">
                @csrf
                <label for="descricaoPedido" id="card-descricao-valor">
                    <p class="h5">Descrição:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="text" class="form-control @error('descricaoPedido') is-invalid @enderror"
                        name="descricaoPedido" required autocomplete="descricaoPedido"
                        style="border-radius: 40px; background-color: #EFF2FB" value="{{ $dados['descricaoPedido'] }}">
                    @error('descricaoPedido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="endereco" id="card-descricao-valor">
                    <p class="h5">Endereço a ser realizado:</p>
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

                <div class="d-flex justify-content-center align-items-center">
                    <div class="profile-container">
                        <label for="arquivo">
                            <img src="/storage/{{ $dados->fotoPedido }}" class="profile-image"
                                onmouseout="hideEditText(this)" />
                            <div class="edit-button" style="width: 100%; heigth: 100%">Editar Sua Foto
                                <input id="arquivo" type="file" class="form-control" name="arquivo">
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="valorPedido" class="h4 label-align"
                        style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor (R$):</label>
                    <p id="card-descricao-label-subtitulo">Digite nesse formato: 99.90</p>
                    <div id="card-descricao-valor">
                        <input id="valorPedido" type="text" class="form-control valor" name="valorPedido"
                            autocomplete="valorPedido" style="border-radius: 40px; background-color: #EFF2FB"
                            value="{{ $dados['valorPedido'] }}">
                    </div>
                </div>


                <div style="display: flex; justify-content: flex-end">
                    <button id="botaozin-padrao">
                        <a id="link-sem-sublinhado" style="color: white"href="/dashboard/Adm">Cancelar</a>

                    </button>
                    <button id="botaozin-padrao">
                        <a id="link-sem-sublinhado" style="color: white">Cadastrar</a>
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
