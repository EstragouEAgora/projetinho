@extends('sistema.layout.layoutDash')
@section('title', 'Perfil | Editar Informações Pessoais')
@section('content')
    <div class="container">
        <form method="POST" action="/dashboard/perfil/atualizar/{{ Auth::User()->id }}" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-center align-items-center">

                <div class="profile-container">
                    <label for="fotoPerfil">
                        <img src="/storage/{{ Auth::User()->fotoPerfil }}" class="profile-image" onmouseout="hideEditText(this)" />
                        <div class="edit-button" style="width: 100%; heigth: 100%">Editar Sua Foto
                            <input id="fotoPerfil" type="file" class="form-control" name="fotoPerfil">
                        </div>
                    </label>
                </div>
            </div>
            <div class="card" id="editar-perfil">
                <label for="apelido">
                    <p class="h4">Apelido:</p>
                </label>
                <div>
                    <input type="text" class="form-control" name="apelido" value="{{ Auth::user()->apelido }}"
                        autocomplete="apelido" style="border-radius: 40px; background-color: #ffff">
                </div>


                <label for="name">
                    <p class="h4" style="margin-top: 20px">Nome Completo:</p>
                </label>
                <div>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                        autocomplete="name" style="border-radius: 40px; background-color: #ffff">
                </div>


                <label for="email">
                    <p class="h4" style="margin-top: 20px">Email:</p>
                </label>
                <div>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                        autocomplete="email" style="border-radius: 40px; background-color: #ffff">
                </div>

                <label for="telefone">
                    <p class="h4" style="margin-top: 20px">Telefone:</p>
                </label>
                <div>
                    <input id="telmask" type="text" class="telefone form-control" name="telefone"
                        value="{{ Auth::user()->telefone }}" style="border-radius: 40px; background-color: #ffff">
                </div>
                @if (Auth::User()->tipo == 2)
                    <label for="servicos">
                        <p class="h4" style="margin-top: 20px">Serviços Prestados:</p>
                    </label>
                    @forelse ($servicosPrestados as $item)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="servicos" checked disabled>
                            <label class="form-check-label" for="servicos">{{ $item->servico->nomeServico }}</label>
                        </div>
                    @empty
                    
                    @endforelse 
                    @foreach ($servicos as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="servicos" id="inlineRadio1" 
                                value={{$item->id}}>
                            <label class="form-check-label" for="servicos">{{ $item->nomeServico }}</label>
                        </div>
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
