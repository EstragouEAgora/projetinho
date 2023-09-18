@extends('sistema.layout.layoutDash')
@section('title', 'Avaliação | Estragou, e agora?')
@section('content')
    <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 150px"><b>Avaliando Prestador</b></p>
    <p id="subtitulo-da-pagina"> Avalie o prestador abaixo de acordo com sua experiência!</p>
    <div class="card" id="card-descricao-servico">
        <form method="POST" action="/dashboard/avaliar/{{ $dados->id }}">
            @csrf
            <div class="form-group">
                <label for="avaliacao" class="h4 label-align"
                    style="margin-left: 10px; margin-right: 30px;">Avaliação:</label>
                <p id="card-descricao-label-subtitulo">Quantas estrelas você acredita que {{ $dados['apelido'] }} merece?
                </p>
                @for ($i = 1; $i <= 5; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="avaliacao" value={{ $i }}>
                        <label class="form-check-label" for="avaliacao">{{ $i }}</label>
                    </div>
                @endfor
                <button id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white">Avaliar</a>
                </button>
            </div>
        </form>
    </div>
@endsection
