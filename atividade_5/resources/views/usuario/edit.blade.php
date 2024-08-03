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
    <form action="{{route('usuario.update',$usuario->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$usuario->nome}}"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="{{$usuario->email}}"/></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" value="{{$usuario->cpf}}"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" value="{{$usuario->cidade}}"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep" value="{{$usuario->cep}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Salvar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/usuarios" style="display: inline">Cancelar</a></td>
            </tr>
    </form>
</body>

</html>