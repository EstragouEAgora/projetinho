@extends('sistema.layoutAuth')

@section('content')
    <div class="row">
        <div class="col-sm-5">
            <img src="{{ asset('storage/imagens/bichoAuth.png') }}" style="margin-top: 190px; width: 800px" />
        </div>
        <div class="col-sm-7" style="background-color: #3C5BBF">
            <div class="container">
                <p class="h1 text-center" style="color: white; margin-top: 90px; font-size: 50px">Seja Bem Vindo!</p>
                <p class="h4 text-center" style="color: white; margin-top: 20px; font-size: 20px"><b>Cadastre-se para continuar</b></p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3" style="margin-top: 30px">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                <i class="bi bi-person-fill">
                                    <img src="{{asset('storage/imagens/person-fill.svg')}}" />
                                </i>
                            </label>
                            <div class="col-md-4 ">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">                    
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                <i class="bi bi-envelope-fill">
                                    <img src="{{asset('storage/imagens/envelope-fill.svg')}}" />
                                </i>
                            </label>
                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
        <form method="POST" action="{{ route('gravaNovoPedido') }}"><strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telefone" class="col-md-4 col-form-label text-md-end">
                                <i class="bi bi-telephone-fill">
                                    <img src="{{asset('storage/imagens/telephone-fill.svg')}}" />
                                </i>
                            </label>
                            <div class="col-md-4">
                                <input id="telmask" type="text" class="telefone form-control" name="telefone" required autocomplete="telefone" placeholder="(35) 99999-9999">
                            </div>
                        </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">
                            <i>
                                <img src="{{ asset('storage/imagens/key-fill.svg') }}" />
                            </i>
                        </label>
                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha (mínimo 8 caracteres)">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                            <i>
                                <img src="{{ asset('storage/imagens/key-fill.svg') }}" />
                            </i>
                        </label>
                        <div class="col-md-4">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar senha">
                        </div>
                    </div>
                    <div class="row mb-3">
                            <label for="tipo" class="col-md-4 col-form-label text-md-end">
                                <i>
                                    <img src="{{asset('storage/imagens/person-bounding-box.svg')}}" />
                                </i>
                            </label>
                            <div class="col-md-6">
                                <select name="tipo" require="required" style="width:'50%'; border-radius: 5px;" id="tipo">
                                        <option value="">Tipo de Usuário</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Prestador">Prestador de Serviço</option>
                                </select>
                            </div>
                    </div>
                    <div class="h5 text-center">
                        <p style="color: white" id="titulo"><b>Já tem uma conta? <a style="color: #F2AA31" href="{{ route('login') }}">Faça Login</a></b></p>
                    </div>
                    <div class="col-md-8 offset-md-4" stlayouts.appyle="background-color: #3C5BBF; margin-botton: 50px">
                        <button type="submit" class="btn btn-primary my-2 my-sm-0" id="botao-cad-login">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="module">
        $().ready(function () {
            let telmask = new Inputmask ('(99) 99999-9999')
            telmask.mask("#telmask");
        });
    </script>
@endsection