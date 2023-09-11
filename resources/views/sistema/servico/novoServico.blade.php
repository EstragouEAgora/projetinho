@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Cadastrar Serviço</b></p>
        <p id="subtitulo-da-pagina">Faça seu pedido de serviço preenchendo o formulário abaixo.</p>
        <div class="card" id="card-descricao-servico">
            <form method="POST" action="{{ route('gravaNovoServico') }}">
                @csrf
                <label for="nomeServico" id="card-descricao-valor">
                    <p class="h5">Nome do serviço:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input id="nomeServico" type="text" class="form-control" name="nomeServico" required
                        autocomplete="nomeServico" style="border-radius: 40px; background-color: #EFF2FB">
                </div>

                <label for="fotoServico" id="card-descricao-valor">
                    <p class="h5">Adicionar imagem:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input id="fotoServico" type="file" class="form-control" name="fotoServico" required
                        style="border-radius: 40px; background-color: #EFF2FB">
                </div>

                <div style="display: flex; justify-content: flex-end">
                    <button id="botaozin-padrao">
                        <a id="link-sem-sublinhado" style="color: white"href="/home">Cancelar</a>

                    </button>
                    <button id="botaozin-padrao" type="submit">
                        <a id="link-sem-sublinhado" style="color: white" href="gravaNovoServico">Cadastrar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <!--
    <script>
        $(document).ready(function($)) {
            $('#valor').mask('R$ 999,99');
        }
    </script>
    -->
@endsection
