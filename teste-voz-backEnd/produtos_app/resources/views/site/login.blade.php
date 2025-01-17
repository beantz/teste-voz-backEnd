@extends('site.layouts.basico')

@section('conteudo')
    {{ isset($msg) ? $msg : '' }}
    <div class="login-container">
        <h2>Pagina de Login</h2>
        <form action="{{ route('login.autenticacao') }}" method="post">
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="insira seu nome">

            <label for="email">E-mail</label>
            <input type="text" name="email" placeholder="insira seu email">

            <label for="password">Senha</label>
            <input type="text" name="password" placeholder="insira seu password">

            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection