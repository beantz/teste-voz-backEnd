@extends('site.layouts.basico')

@section('conteudo')
    {{ $data = '' }}
    {{ isset($msg) ? $msg : '' }}

    @if ($tipo == 'produto' && $produto != null)
        {{ $data = $produto }}
    @endif

    @if ($tipo == 'categoria')
        {{ $data = $categoria }}
    @endif

    <div class="listaProdutos">
        <table border="1" width="50%">
            <thead>
                <tr>
                    <th>Nome</th>
                    @if( $tipo == 'produto')
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->nome }}</td>
                    @if( $tipo == 'produto')
                        <td>{{ $data->descricao }}</td>
                        <td>{{ $data->preco }}</td>
                        <td>{{ $data->categoria_id }}</td>
                    @endif
                </tr>
            <tbody>
        </table>
    </div>
@endsection