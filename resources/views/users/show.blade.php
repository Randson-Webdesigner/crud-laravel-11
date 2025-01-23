<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuários</title>
</head>
<body>

    <a href="{{ route('user.index') }}">Listar</a>
    <a href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a>
    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form>
    <h2>Visualizar Usuário</h2>

    @if ( session('success') )  
    <p style="color: #086;">
        {{ session('success') }}
    </p> 
    @endif

    <b>Id:</b> {{ $user->id }}<br>
    <b>Nome:</b> {{ $user->name }}<br>
    <b>E-mail: </b> {{$user->email}}<br>
    <b>Cadastrado: </b> {{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s')}}<br>
    <b>Editado: </b> {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s')}}<br>   

  
</html>