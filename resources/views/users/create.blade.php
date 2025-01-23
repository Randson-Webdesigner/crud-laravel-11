<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud laravel</title>
</head>
<body>
    <a href="{{ route('user.index') }}">Listar</a>
    <h1>Criar Usuário</h1>

    @if ($errors->any())        
        @foreach ($errors->all() as $error)
        <p style="color:brown">
            {{ $error }}   
        </p>         
        @endforeach   
    @endif

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method('POST')
        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome Completo" value=" {{ old('name')}} "><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="digite o seu melhor E-mail"><br><br>

        <label>Senha: </label>
        <input type="password" name="password" placeholder="digite a Senha"><br><br>

        <button type="submit">Cadastrar</button>

    </form>
</body>
</html>