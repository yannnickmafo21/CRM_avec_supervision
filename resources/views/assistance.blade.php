<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Assistance</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/bulle.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <bulle_discussion></bulle_discussion>
    </div>
</body>
</html>
