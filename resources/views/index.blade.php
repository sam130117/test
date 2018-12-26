<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
<script>
    let script = document.createElement('script');
    script.src = "https://cdn.socket.io/socket.io-1.4.5.js";
    document.body.appendChild(script);

    script.onload = function() {
        window.socket = io.connect (':' + '<?= env('NODE_PORT', 3005)?>', { reconnect: true, query: { user_id: '4' } });
        window.socket.io.on("connect_error", function(error) {
            console.log('Connection error.');
        });
    };
</script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
</body>
</html>
