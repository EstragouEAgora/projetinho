@extends('sistema.layout.layout')
@section('title','Home | Estragou, e agora?')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <p class="h1 text-start" id="index-titulo" style="margin-top: 40px"><b>Estragou</b></p>
            <p class="h1 text-start" id="index-titulo"><b>e agora?</b></p>
            <p class="h6 text-start" id="index-slogan"><b>Consertos rápidos, resultados duradouros</b></p>
        </div>
        <div class="col-sm-6" style="position:relative">
            <img src="{{asset('storage/imagens/bicho.png')}}" id="index-bicho" />
        </div>
        <div style="position:absolute">
            <img src="{{asset('storage/imagens/onda.png')}}" id="index-ondas"/>
        </div>
    </div>
@endsection
