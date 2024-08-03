<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar usuario</title>
</head>

<body>
    <h1>Criar um novo usuario</h1>
    <form action="/usuario" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/usuarios" style="display: inline">Voltar</a></td>
            </tr>
    </form>
</body>

</html>