@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
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
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Pedidos para você! Dê uma olhada e se candidate!</p>
        @forelse ($servicos as $item)
            @foreach ($item->servico->pedido as $value)
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="h5 card-title">
                                    <span
                                        style="color: #3c5bbf; font-weight: bold;">{{ $item->servico->nomeServico }}</span>
                                </p>
                                <p class="card-text"><b>Descrição:</b>{{ $value->descricaoPedido }}</p>
                                <p class="card-text"><b>Valor:</b> R$ {{ $value->valorPedido }}</p>
                                <form method="POST" action="/dashboard/pedidos/candidatar/{{ $value->id }}">
                                    @csrf
                                    <div class="campo-novo-valor" style="display: none;">
                                        <label for="novoValor" class="h4 label-align"
                                            style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor
                                            (R$)
                                            :</label>
                                        <p id="card-descricao-label-subtitulo">Sugira um novo valor para tal serviço...</p>
                                        <div id="card-descricao-valor">
                                            <input id="novoValor" type="text" class="form-control valor" name="novoValor"
                                                required autocomplete="valorPedido"
                                                style="border-radius: 40px; background-color: #EFF2FB"
                                                value={{ $value->valorPedido }}>
                                        </div>
                                        <button class="btn btn-secondary" id="botaozin-padrao">Candidatar-me</button>
                                    </div>
                                    <div class="campo-novo-valor">
                                        <a href="#" class="btn btn-secondary botao-candidatar" data-id="{{ $value->id }}"> Candidatar-me </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <p class="h1 text-start" id="subtitulo-da-pagina"><b>Voce ainda não se cadastrou em nenhum serviço!</b></p>
            <p id="subtitulo-da-pagina">Vá até o seu <a href="/dashboard/perfil" id="link-sem-sublinhado">Perfil</a> e
                associe-se a algum serviço!!</p>
        @endforelse
    </div>
@endsection
@section('javascript')
    <script>
        const botoesCandidatar = document.querySelectorAll('.botao-candidatar');

        botoesCandidatar.forEach(botao => {
            botao.addEventListener('click', function() {
                const id = botao.getAttribute('data-id');
                const campoNovoValor = document.querySelector(`#campo-novo-valor-${id}`);

                if (campoNovoValor.style.display === 'none' || campoNovoValor.style.display === '') {
                    campoNovoValor.style.display = 'block';
                    botao.innerText = 'Cancelar';
                } else {
                    campoNovoValor.style.display = 'none';
                    botao.innerText = 'Candidatar-me';
                }
            });
        });
    </script>
@endsection