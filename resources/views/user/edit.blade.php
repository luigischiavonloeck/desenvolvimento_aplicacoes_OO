<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar usuario</title>
</head>

<body>
    <h1>Editar um usuario</h1>
    <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$user->nome}}"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="{{$user->email}}"/></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" value="{{$user->cpf}}"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" value="{{$user->cidade}}"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep" value="{{$user->cep}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Salvar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/users" style="display: inline">Cancelar</a></td>
            </tr>
    </form>
</body>

</html>