@extends('layout.base')

@section('titulo', 'Atualizar perfil usuário')

@section('conteudo')
    <form action="{{ route('atualizar', ['id' => $id]) }}" method="post">

        {{ csrf_field() }}
       
        <!--input type="hidden" name="id" value="{{ $id }}"-->
        
        <div class="field">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $usuario->nome }}"/>
            @if($errors->has('nome'))
                @foreach ($errors->get('nome') as $erro)
                    <strong class="erro">{{ $erro }}</strong>
                @endforeach
            @endif

        </div>

        <div class="field">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" value="{{ $usuario->email }}"/>
            @if($errors->has('email'))
                @foreach ($errors->get('email') as $erro)
                    <strong class="erro">{{ $erro }}</strong>
                @endforeach
            @endif
        </div>

       
        <div class="btn">
            <button type="submit">Salvar</button>
        </div> 
    </form>
@endsection