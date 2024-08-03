<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar bandeira</title>
</head>

<body>
    <h1>Criar um novo bandeira</h1>
    <form action="/bandeira" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Imagem:</td>
                <td><input type="text" name="imagem"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/bandeiras" style="display: inline">Voltar</a></td>
            </tr>
    </form>
</body>

</html>