<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
    @if ($users->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cidade</th>
                <th>CEP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>
                <a href="/users/{{$user->id}}">{{$user->id}}</a>
            </td>
                <td>{{$user->nome}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->cidade}}</td>
                <td>{{$user->cep}}</td>
                <td>
                    <a href="{{route('user.edit',$user->id)}}">Editar</a>
                    <a href="{{route('user.delete',$user->id)}}">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Usuários não encontrados! </p>
    @endif
</body>
</html>