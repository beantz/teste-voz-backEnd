
{{ isset($msg) ? $msg : ''}}

@if(empty($baseDados))
    <div class="empty">
        Ainda não possuimos {{$dado}} cadastrados
    </div>
@else
    <div class="listaProdutos">
        <div>
            <p>Possui o total de: {{$dataQuantity}} {{$dado}} cadastrados.</p>
        </div>
        <table border="1" width="50%">
            <thead>
                <tr>
                    <th>Nome</th>
                    @if($dado == 'produtos')
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($baseDados as $key => $data)
                    <tr>
                        <td><a href="{{ route('visualizar.produto', $data->id) }}">{{ $data->nome }}</td>
                        @if($dado == 'produtos')
                            <td>{{ $data->descricao }}</td>
                            <td>{{ $data->preco }}</td>
                            <td>{{ $data->categoria_id }}</td>
                        @endif
                    </tr>
                @endforeach 
            <tbody>
        </table>
    </div>
@endif