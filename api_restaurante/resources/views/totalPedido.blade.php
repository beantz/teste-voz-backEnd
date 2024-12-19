<!DOCTYPE html>
<html>
<head>
    <title>Tabela de Pedidos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<h2>Ola {{ $nome }}, este é o seu pedido</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome Cliente</th>
        <th>Refeição</th>
        <th>Bebida</th>
        <th>Total</th>
    </tr>
    <tr>
        <td>1</td>
        <td>{{ $nome }}</td>
        <td>{{ $comida }}</td>
        <td>{{ $bebida }}</td>
        <td>{{ $total }}</td>
    </tr>
    </table>

</body>
</html>