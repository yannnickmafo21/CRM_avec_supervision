<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/connexion_agent.css','resources/js/app.js'])
</head>
<body>
    <div id="app">
        <ajouter_employe></ajouter_employe>
    </div>
</body>
</html>
