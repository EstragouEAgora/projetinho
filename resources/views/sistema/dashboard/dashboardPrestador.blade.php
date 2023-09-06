@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="row">
        <div class="col-sm-6" style="position:relative">
            <img src="{{ asset('storage/imagens/bicho.png') }}" id="index-bicho" />
        </div>
        <div style="position:absolute">
            <img src="{{ asset('storage/imagens/onda.png') }}" id="index-ondas" />
        </div>
    @endsection
