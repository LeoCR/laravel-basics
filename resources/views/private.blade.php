<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Private Content</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
    <body>
        <h1>Private Content</h1>
        <form action="{{ route('logout') }}" method="post">
        @csrf
            <button type="submit">Logout</button>
        </form>
    </body>
</html>
