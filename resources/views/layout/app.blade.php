<!-- resources/views/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/scss/app.scss')
        <title>@yield('title', 'Spotify')</title>
    </head>
    <body>
        <div class="flex">
            @include('layout.sidebar')
            @yield('content')
        </div>
    </body>
</html>
