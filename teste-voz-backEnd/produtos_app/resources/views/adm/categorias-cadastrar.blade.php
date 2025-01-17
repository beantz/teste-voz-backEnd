@extends('adm.layouts.basico')

@section('conteudo')
    {{ $id = '' }}
    @if($rota == 'cadastrar.categorias')
        {{ $categoria = '' }}
    @endif

    <div class="categorias-container">
        {{ isset($msg) ? $msg : '' }}
        <h2>Informe aqui a nova categoria!</h2>
        <form action="{{ route($rota, $id) }}" method="post">
            @csrf
            @method('UPDATE')
            <label for="name"></label>
            <input type="text" name="name" placeholder="insira o nome da nova categoria" value="{{ $categoria->nome ?? '' }}">

            <button type="submit">Cadastrar</button>
        </form>
    </div>
@endsection