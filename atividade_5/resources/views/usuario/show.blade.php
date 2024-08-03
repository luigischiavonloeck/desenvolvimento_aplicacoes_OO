<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    @if ($usuario)
        <h1>{{ $usuario->nome }}</h1>
        <p>{{ $usuario->email }}</p>
        <ul>
            <li>CPF: {{ $usuario->cpf}}</li>
            <li>Cidade: {{ $usuario->cidade }}</li>
            <li>CEP: {{ $usuario->cep }}</li>
        </ul>
    @else
        <p>Usuarios não encontrados! </p>
    @endif
    <a href="/usuarios">Voltar</a>
</body>
</html>