<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
</body>
</html>
