<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trilha Web</title>

    <link rel="stylesheet" href="{{  asset('style.css') }}">
</head>
<body>

<div class="container">  
    @yield('content')
</div>

    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('bootstrap.js') }}"></script>
</body>
</html>