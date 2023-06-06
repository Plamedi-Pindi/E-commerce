<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>quantidade</th>
                <th>limite</th>
                <th>id_produto</th>
                <th>id_usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $estoque as  $estoque)
            <tr>
                <td>{{ $estoque->id }}</td>
                <td>{{ $estoque->quantidade}}</td>
                <td>{{ $estoque->limite_min}}</td>
                <td>{{ $estoque->id_produto}}</td>
                <td>{{ $estoque->id_user}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

</body>
</html>
