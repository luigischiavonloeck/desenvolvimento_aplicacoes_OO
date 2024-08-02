<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar posto</title>
</head>

<body>
    <h1>Editar um Posto</h1>
    <form action="{{route('posto.update',$posto->id)}}" method="POST">
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$produto->nome}}"/></td>
            </tr>
            <tr>
                <td>CNPJ:</td>
                <td><input type="text" name="cnpj" value="{{$produto->cnpj}}"/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" value="{{$produto->endereco}}"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep" value="{{$produto->cep}}"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" value="{{$produto->cidade}}"/></td>
            </tr>
            <tr>
                <td>Latitude:</td>
                <td><input type="number" name="cordX" value="{{$produto->cordX}}"/></td>
            </tr>
            <tr>
                <td>Longitude:</td>
                <td><input type="number" name="cordY" value="{{$produto->cordY}}"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Salvar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/postos" style="display: inline">Cancelar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>