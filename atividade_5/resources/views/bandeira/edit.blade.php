<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar bandeira</title>
</head>

<body>
    <h1>Editar um bandeira</h1>
    <form action="{{route('bandeira.update',$bandeira->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$bandeira->nome}}"/></td>
            </tr>
            <tr>
                <td>Imagem:</td>
                <td><input type="text" name="imagem" value="{{$bandeira->imagem}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Salvar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/bandeiras" style="display: inline">Cancelar</a></td>
            </tr>
    </form>
</body>

</html>