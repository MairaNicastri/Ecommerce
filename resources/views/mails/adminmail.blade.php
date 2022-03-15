<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$dati['name']}} ci ha contattato</p>
    <p>ha scritto {{$dati['message']}}</p>
    <p>le sue disponibilita lavorative sono {{$dati['disponibilita']}}</p>
    <p>la sua mail e' {{$dati['email']}}</p>
    <p>eta:{{$dati['eta']}}</p>
</body>
</html>