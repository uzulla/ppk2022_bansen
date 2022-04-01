<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>latest bansen</title>
</head>
<body>
<h1>latest bansen no is...</h1>

@auth
    <h2>Now logged in!!!</h2>
@endauth

<h2>{{ $latest_bansen_no }}</h2>

<h3>last update at : {{ $last_update_at }}</h3>

<form action="{{ route("bansen_increment") }}" method="post">
    @csrf
    <button type="submit">Increment!!</button>
</form>

</body>
</html>
