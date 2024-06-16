<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
<div class="container">
    <img src="{{ asset('assets/logo.png') }}" alt="MLP Logo" style="width: 150px;">
    <h2>To-Do List</h2>
    @livewire('tasks')
    <footer>Copyright © 2020 All Rights Reserved.</footer>
</div>

@livewireScripts
</body>
</html>
