<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    @if ($user)
        <h1>{{ $user->nome }}</h1>
        <p>{{ $user->email }}</p>
        <ul>
            <li>CPF: {{ $user->cpf}}</li>
            <li>Cidade: {{ $user->cidade }}</li>
            <li>CEP: {{ $user->cep }}</li>
        </ul>
    @else
        <p>Usuarios não encontrados! </p>
    @endif
    <a href="/users">Voltar</a>
</body>
</html>