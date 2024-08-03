<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeira</title>
</head>
<body>
    @if ($bandeira)
        <h1>{{ $bandeira->nome }}</h1>
        <p>{{ $bandeira->imagem }}</p>
    @else
        <p>Bandeiras não encontrados! </p>
    @endif
    <a href="/bandeiras">Voltar</a>
</body>
</html>