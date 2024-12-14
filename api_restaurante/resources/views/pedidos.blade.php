<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Pedido</title>
</head>
<body>
    @if($errors->any())
        @foreach ($errors as $erro)      
        <form action="{{ route('pedidos') }}" method="post">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" value="{{ old('nome') }}" id="nome" name="nome">
            {{ $errors->has('nome') ? $erro : ''}}
            <br>
            <label for="refeicao">Refeição:</label>
            <input type="text" value="{{ old('refeição') }}" id="refeição" name="refeição">
            {{ $errors->has('refeição') ? $erro : ''}}
            <br>
            <label for="bebida">Bebida:</label>
            <input type="text" value="{{ old('bebida') }}" id="bebida" name="bebida">
            {{ $errors->has('bebida') ? $erro : ''}}
            <br>

            <!-- usar old aqui -->
            <label for="pagamento">Forma de Pagamento:</label>
            <select id="pagamento" name="pagamento">
                <option value="1">Dinheiro</option>
                <option value="2">Cartão</option>
                <option value="3">Pix</option>
            </select>
            <br>
            <button type="submit">Enviar Pedido</button>
            
        </form>
        @endforeach
    @endif

</body>
</html>