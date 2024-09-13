<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Postos</title>
</head>
<body>
    <h1>Postos</h1>
    @if ($postos->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>CEP</th>
                <th>Cidade</th>
                <th>CordX</th>
                <th>CordY</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postos as $posto)
            <tr>
            <td>
                <a href="/postos/{{$posto->id}}">{{$posto->id}}</a>
            </td>
                <td>{{$posto->nome}}</td>
                <td>{{$posto->cnpj}}</td>
                <td>{{$posto->endereco}}</td>
                <td>{{$posto->cep}}</td>
                <td>{{$posto->cidade}}</td>
                <td>{{$posto->cordX}}</td>
                <td>{{$posto->cordY}}</td>
                <td>
                    <a href="{{route('posto.edit',$posto->id)}}">Editar</a>
                    <a href="{{route('posto.delete',$posto->id)}}">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Postos não encontrados! </p>
    @endif
</body>
</html>