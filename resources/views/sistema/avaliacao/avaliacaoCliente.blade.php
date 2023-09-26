@extends('sistema.layout.layoutDash')
@section('title', 'Avaliação | Estragou, e agora?')
@section('content')
    <div class="container">
        <div class="card border" style="margin-top: 60px; border: none;">
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
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 50px"><b>Avaliação - Prestadores de Serviço</b></p>
        @foreach ($dados as $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/{{ $item->fotoPerfil }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->apelido }}</h5>
                        <p class="card-title">{{ $item->name }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($item->avaliacao != 5)
                            @if ($item->avaliacao == 6)
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <p>Ainda não avaliado!</p>
                                <a href="/dashboard/avaliar/{{ $item->id }}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">
                                        Avaliar
                                    </button>
                                </a>
                            @elseif ($item->avaliacao == 0)
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <a href="/dashboard/avaliar/{{ $item->id }}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">
                                        Avaliar
                                    </button>
                                </a>
                            @else
                                @for ($i = 0; $i < $item->avaliacao; $i++)
                                    <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                @endfor
                                @for ($i = 0; $i < $item->resto; $i++)
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                @endfor
                                <a href="/dashboard/avaliar/{{ $item->id }}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">
                                        Avaliar
                                    </button>
                                </a>
                            @endif
                        @else
                            @for ($i = 0; $i < $item->avaliacao; $i++)
                                <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                            @endfor
                            <a href="/dashboard/avaliar/{{ $item->id }}">
                                <button class="btn btn-secondary" id="botaozin-padrao">
                                    Avaliar
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
