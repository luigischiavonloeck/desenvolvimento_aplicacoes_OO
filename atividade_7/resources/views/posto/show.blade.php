<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posto</title>
</head>
<body>
    @if ($posto)
        <h1>{{ $posto->nome }}</h1>
        <p>{{ $posto->endereco }}</p>
        <ul>
            <li>CNPJ: {{ $posto->cnpj}}</li>
            <li>CEP: {{ $posto->cep }}</li>
            <li>Cidade: {{ $posto->cidade }}</li>
            <li>Latitude: {{ $posto->cordX }}</li>
            <li>Longitude: {{ $posto->cordY }}</li>
        </ul>
    @else
        <p>Postos não encontrados! </p>
    @endif
    <a href="/postos">Voltar</a>
</body>
</html>