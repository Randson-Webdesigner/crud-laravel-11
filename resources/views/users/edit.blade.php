<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
</head>
<body>
    <a href="{{ route('user.index', ['user' => $user->id]) }}">Listar</a>
    <a href="{{ route('user.show', ['user' => $user->id]) }}">Visualizar</a>
    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form>
    <h2>Editar Usuário</h2><br>

    @if ( session('success') )  
    <p style="color: #086;">
        {{ session('success') }}
    </p> 
    @endif

    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome Completo" value=" {{ old('name', $user->name)}} "><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="digite o seu melhor E-mail" value=" {{ old('email', $user->email)}} "><br><br>

        <label>Senha: </label>
        <input type="password" name="password"  placeholder="digite a Senha"><br><br>

        <button type="submit">Salvar</button>

    </form>
</body>
</html>