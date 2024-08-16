<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar posto</title>
</head>

<body>
    <h1>Criar um novo Posto</h1>
    <form action="/posto" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>CNPJ:</td>
                <td><input type="text" name="cnpj"/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade"/></td>
            </tr>
            <tr>
                <td>Latitude:</td>
                <td><input type="number" name="cordX"/></td>
            </tr>
            <tr>
                <td>Longitude:</td>
                <td><input type="number" name="cordY"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/postos" style="display: inline">Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>