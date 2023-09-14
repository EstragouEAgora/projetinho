@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container">
        <div class="card border" style="margin-top: 60px; border: none; background-color: #28a745; ">
            @if (session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div><br />
            @elseif (session()->get('success'))
                <div class="alert alert-success"
                    style="text-align: center; padding: 5px; margin: 0; border: none; background-color: #28a745;">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 18px; color: white;">{{ session()->get('success') }}</span>
                    </div>
                </div><br />
            @endif
        </div>
    </div>


    <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
    <p id="subtitulo-da-pagina">Estes são os serviços que estão disponíveis para os usuários...</p>
    <button id="botaozin-padrao">
        <a id="link-sem-sublinhado" style="color: white" href="{{ route('novoServico') }}"><b> + Novo </b></a>
    </button>
    <div class="row">
        @if ($todos == null)
            <p style="text-align: center;">Não há Serviços cadastrados!</p>
        @else
            @foreach ($todos as $item)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" src="/storage/{{ $item->fotoServico }}" alt="{{ $item['nomeServico'] }}">
                        <div class="card-body">
                            <p id="txt-card-dash-cliente"><b>{{ $item['nomeServico'] }}</b></p>
                            <div class="col text-end">
                                <a href="/servico/editar/{{ $item->id }}" id="link-sem-sublinhado">
                                    <i class="bi bi-pencil-fill">
                                        <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                    </i>
                                </a>
                                <a href="/servico/delete/{{ $item->id }}" id="link-sem-sublinhado"
                                    onclick="return confirm('Tem certeza que deseja apagar esse serviço?');">
                                    <i class="bi bi-trash3-fill">
                                        <img src="{{ asset('storage/imagens/trash.svg') }}">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
@endsection
