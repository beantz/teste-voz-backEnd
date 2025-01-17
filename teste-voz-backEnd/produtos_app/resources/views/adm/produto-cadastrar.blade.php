@extends('adm.layouts.basico')

@section('conteudo')

    @if ($id == '')
        {{ $produto = null }}

    @endif
    {{ isset($msg) ? $msg : '' }}
    
    <div class="formulario">
        <h2>Informe aqui seu novo produto.</h2>
        <form action="{{ route($rota, $id) }}" method="post">
            @csrf
            @if ($rota == 'atualizar.produto')
                @method('PUT')
            @endif

            <label for>Nome</label>
            <input type="text" name="nome" value="{{ old('nome') ?? $produto->nome ?? ''}}">
            {{-- para retornar o ultimo valor inserido no input caso algum dos outro campos retorne um erro, e os dados ainda não tenham sido enviados --}}

            <label for>Descrição</label>
            <input type="text" name="descricao" value="{{ old('descricao') ?? $produto->descricao ?? ''}}">
-
            <label for>Preço</label>
            <input type="text" name="preco" value="{{ old('preco') ?? $produto->preco ?? ''}}">

            {{-- como duas rotas(criar e atualizar) estao usando a mesma view, essa é a forma para lidar com os dados de produto no select --}}
            <select name="categoria_id">
                @foreach ($categorias->data as $key => $categoria)
                    @if($produto == null)  
                        <option value="{{ $categoria->id }}" 
                            {{ $categoria->id == old('categoria_id') ? 'selected' : ''}}>{{ $categoria->nome }}
                        </option>
                    @else
                        <option value="{{ $categoria->id }}" 
                            {{$produto->categoria_id == $categoria->id ? 'selected' : ($categoria->id == old('categoria_id') ? 'selected' : '')}}>{{ $categoria->nome }}
                        </option>
                    @endif  
                @endforeach
            
            <select>

            <button type="submit">Enviar</button>

        </form>

    </div>
@endsection