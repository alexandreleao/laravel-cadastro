@extends('layout.base')

@section('titulo', 'Usuário Atualizado')

@section('conteudo')
    <h1> Usuário {{ $usuario->nome }}, atualizado com sucesso!</h1>

    <p>{{ $usuario->email }}</p>

    <a href="{{ route('home') }}">Voltar</a>
@endsection