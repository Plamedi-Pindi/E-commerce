<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pagamento</h1>
    <form action="{{ route('api.pagamento') }}" method="POST">
        @csrf

        <input type="text" name="total" >
        <button type="submit">Pagar</button>
    </form>

</body>
</html>
