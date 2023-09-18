@extends('sistema.layout.layoutDash')
@section('title', 'Perfil | Editar Informações Pessoais')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center">
                <img src="{{ asset('storage/imagens/person-fill.svg') }}"
                    style="width: 250px; border-radius: 100px; margin-top: 55px;" />
                <h4 style="color: #38393C; font-size: 35px">{{ Auth::user()->name }}</h4>
                <p style="color: #ABAEB7; font-size: 20px">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="card" id="editar-perfil">
            <form method="POST" action="/perfil/atualizar/{{ Auth::User()->id }}">
                @csrf

                <!-- <img src="{{ $dados['fotoPerfil'] }}" class="card-img-top" alt="{{ $dados['fotoPerfil'] }}"> -->
                <input id="fotoPerfil" type="file" class="form-control" name="fotoPerfil" required
                    style="border-radius: 40px; background-color: #EFF2FB">

                <label for="apelido">
                    <p class="h4">Apelido:</p>
                </label>
                <div>
                    <input type="text" class="form-control" name="apelido" value="{{ Auth::user()->apelido }}" required
                        autocomplete="apelido" style="border-radius: 40px; background-color: #ffff">
                </div>


                <label for="name">
                    <p class="h4">Nome:</p>
                </label>
                <div>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required
                        autocomplete="name" style="border-radius: 40px; background-color: #ffff">
                </div>


                <label for="email">
                    <p class="h4" style="margin-top: 20px">Email:</p>
                </label>
                <div>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required
                        autocomplete="email" style="border-radius: 40px; background-color: #ffff">
                </div>

                <label for="phone">
                    <p class="h4" style="margin-top: 20px">Telefone:</p>
                </label>
                <div>
                    <input id="telmask" type="text" class="telefone form-control" name="telefone"
                        value="{{ Auth::user()->telefone }}" required autocomplete="telefone"
                        style="border-radius: 40px; background-color: #ffff">
                </div>
                @if (Auth::User()->tipo == 2)
                    <label for="servicos">
                        <p class="h4" style="margin-top: 20px">Serviços Prestados:</p>
                    </label>
                    @foreach ($servicosPrestados as $item)
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1 flexSwitchCheckChecked"
                            value="{{ $item->servico_id }}">
                        <label class="form-check-label" for="servicos">{{ $item->servico->nomeServico }}</label>
                    @endforeach
                    @foreach ($servicos as $item)
                        @foreach ($servicosPrestados as $value)
                            @if ($item->id != $svalue->servico_id)
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1 flexSwitchCheckDefault"
                                    value="{{ $item->id }}">
                                <label class="form-check-label" for="servicos">{{ $item->nomeServico }}</label>
                            @endif
                        @endforeach
                    @endforeach
                @endif
                <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                    <button type="button" id="botaozin-padrao" href="/home">Cancelar</button>
                    <button type="submit" id="botaozin-padrao">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
    <script type="module">
        $().ready(function() {
            let telmask = new Inputmask('(99) 99999-9999')
            telmask.mask("#telmask");
        });
    </script>
@endsection
