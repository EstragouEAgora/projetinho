@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
        <div class="card border" style="margin-top: 60px" id="esconder-card-board">
            @if (session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div><br />
            @elseif (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
        </div>
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
        <p id="subtitulo-da-pagina">Estes são os serviços que estão disponíveis para os usuários...</p>
        <button id="botaozin-padrao">
            <a id="link-sem-sublinhado" style="color: white" href="{{ route('novoServico') }}"><b> + Novo </b></a>
        </button>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    @if ($todos == NULL)
                        <p style="text-align: center;">Não há Serviços cadastrados!</p>
                    @else
                        @foreach ($todos as $item)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top" src="/storage/{{$item->fotoServico}}" alt="{{ $item['nomeServico'] }}">
                                    <div class="card-body">
                                        <h3>{{ $item['nomeServico'] }}</h3>
                                    </div>
                                    <div class="col text-end">
                                        <a href="/servico/editar/{{ $item->id }}" id="link-sem-sublinhado">
                                            <i class="bi bi-pencil-fill">
                                                <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                            </i>
                                        </a>
                                        <a href="/servico/delete/{{ $item->id }}" id="link-sem-sublinhado" onclick="return confirm('Tem certeza que deseja apagar esse serviço?');">
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
