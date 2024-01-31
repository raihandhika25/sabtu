<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Doucment</title>
</head>

<body>
    @include('partials.sidebar')
    <div class="ps-72 pe-20 py-20">
        @yield('konten')
    </div>

</body>
