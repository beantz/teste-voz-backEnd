@extends('site.layouts.basico')

@section('conteudo')
    <div class="login-container">
        <h2>Pagina de adm</h2>
        {{ isset($msg) ? $msg : '' }}
            <h3>Gerenciar Produtos</h3>
            <ul>
                <li><a href="{{ route('view.cadastrar.produtos') }}">Cadastrar Produtos novos produtos</a></li>
                @foreach ($produtos->data as $key => $produto)
                    <tr>
                        <td><a href="{{ route('visualizar.produto', $produto->id) }}">{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>{{ $produto->categoria_id }}</td>
                        <td>
                            <td>
                                <form action="{{ route('view.cadastrar.produtos', $produto->id) }}" method="post">
                                    <button type="submit"> Editar</button>
                                </form>
                            </td>
                        </td>
                        <td>
                            <form action="{{ route('deletar.produto', $produto->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </ul>
            <h3>Gerenciar Categorias</h3>
            <ul>
                <li><a href="{{ route('view.cadastrar.categorias') }}">Cadastrar novas Categorias</a></li>
                @foreach ($categorias->data as $key => $categoria)
                    <tr>
                        <td><a href="{{ route('visualizar.categoria', $categoria->id) }}">{{ $categoria->nome }}</td>
                        <td>{{ $categoria->descricao }}</td>
                        <td>
                            <td>
                                <form action="{{ route('view.cadastrar.categorias', $categoria->id) }}" method="post">
                                    <button type="submit"> Editar</button>
                                </form>
                            </td>
                        </td>
                        <td>
                            <form action="{{ route('deletar.categorias', $categoria->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </ul>
        </form>
    </div>
@endsection