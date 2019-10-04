<!DOCTYPE html>
<html lang="en">
    <head>
        <title> @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::to('public/css/app.css') }}" rel="stylesheet"/>
        @yield('styles')
    </head>
    <body>
        @include('includes.header')
        <main class="main">
            @yield('content')
        </main>
    </body>
</html>
