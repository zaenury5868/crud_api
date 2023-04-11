<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($body['type'] == 'created')
        {{ $body['name'] }} berhasil {{ $body['action'] }} <b>{{ $body['name_category'] }}</b>
    @else
        {{ $body['name'] }} berhasil {{ $body['action'] }} <b>{{ $body['name_category'] }}</b>
    @endif
</body>
</html>