@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
        <p id="subtitulo-da-pagina">Estes são os serviços que estão disponíveis para os usuários...</p>
        <button id="botaozin-padrao">
            <a id="link-sem-sublinhado" style="color: white" href="{{ route('novoServico') }}"><b> + Novo </b></a>
        </button>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    @if (count($dados) == 0)
                        <p style="text-align: center;">Não há Serviços cadastrados!</p>
                    @else
                        @foreach ($dados as $item => $value)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="/storage/{{ $value->fotoServico }}"
                                        alt="{{ $value->nomeServico }}">
                                    <div class="card-body">
                                        <h3>{{ $value['nomeServico'] }}</h3>
                                    </div>
                                    <div class="col text-end">
                                        <a href="/excluir-servico/" id="link-sem-sublinhado">
                                            <i class="bi bi-pencil-fill">
                                                <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                            </i>
                                            <i class="bi bi-trash3-fill">
                                                <img src="{{ asset('storage/imagens/trash.svg') }}">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
