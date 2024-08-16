<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bandeiras</title>
</head>
<body>
    <h1>Bandeiras</h1>
    @if ($bandeiras->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bandeiras as $bandeira)
            <tr>
            <td>
                <a href="/bandeiras/{{$bandeira->id}}">{{$bandeira->id}}</a>
            </td>
                <td>{{$bandeira->nome}}</td>
                <td>{{$bandeira->imagem}}</td>
                <td>
                    <a href="{{route('bandeira.edit',$bandeira->id)}}">Editar</a>
                    <a href="{{route('bandeira.delete',$bandeira->id)}}">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Bandeiras não encontrados! </p>
    @endif
</body>
</html>