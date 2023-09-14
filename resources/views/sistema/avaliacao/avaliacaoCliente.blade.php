@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 50px"><b>Avaliação - Prestadores de Serviço</b></p>
        @foreach ($dados as $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm" style="width: 18rem;">
                    <img src="{{ asset('storage/imagens/clientePadrao.png') }}">
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
                            @elseif ($item->avaliacao == 0)
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                            @else
                                @for ($i = 0; $i < $item->avaliacao; $i++)
                                    <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                @endfor
                                @for ($i = 0; $i < $item->resto; $i++)
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                @endfor
                            @endif
                        @else
                            @for ($i = 0; $i < $item->avaliacao; $i++)
                                <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
