@extends('sistema.layoutDash')
@section('title', 'Perfil | Editar Informações Pessoais')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="">
        <div class="text-center">
            <img src="{{ asset('storage/imagens/person-fill.svg') }}" style="width: 250px; border-radius: 100px; margin-top: 55px;" />
            <h4 style="color: #38393C; font-size: 35px">{{ Auth::user()->name }}</h4>
            <p style="color: #ABAEB7; font-size: 20px">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="card" id="editar-perfil">
        <form method="POST" action="{{ route('gravaNovoPedido') }}" >
            @csrf
            @method('PUT')
            <label for="name">
                <p class="h4">Nome:</p>
            </label>
            <div>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" style="border-radius: 40px; background-color: #ffff">
            </div>

            <label for="email">
                <p class="h4" style= "margin-top: 20px">Email:</p>
            </label>
            <div>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" style="border-radius: 40px; background-color: #ffff">
            </div>

            <label for="phone">
                <p class="h4" style= "margin-top: 20px">Telefone:</p>
            </label>
            <div>
                <input type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}" autocomplete="tel" style="border-radius: 40px; background-color: #ffff">
            </div>

            <label for="password">
                <p class="h4" style= "margin-top: 20px">Senha:</p>
            </label>
            <div>
                <input type="password" class="form-control" name="password" autocomplete="new-password" style="border-radius: 40px; background-color: #ffff">
            </div>

            <div style="display: flex; justify-content: flex-end; margin-top: 20px;">
                <button type="button" id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white" href="/home">Cancelar</a>
                </button>
                <button type="submit" id="botaozin-padrao">
                    <a id="link-sem-sublinhado" style="color: white">Salvar Alterações</a>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection