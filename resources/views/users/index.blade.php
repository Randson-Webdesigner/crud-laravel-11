<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Laravel</title>
</head>
<body>
    <a href="{{ route('user.create') }}">Cadastrar</a>
    <h2>Listar Usuário</h2>

    @if ( session('success') )  
        <p style="color: #086;">
            {{ session('success') }}
        </p> 
    @endif

    @forelse($users as $user)
        <b>ID:</b> {{ $user->id }}<br>
        <b>Nome:</b> {{ $user->name }}<br>
        <b>E-mail:</b> {{ $user->email }}<br>
            <a href="{{ route('user.show', ['user' => $user->id]) }}">Visualizar</a>
            <a href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a>           
            <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
            </form>
        <hr>
    @empty

    @endforelse

</body>
</html>