<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Insert Pokemon</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-6">
                @foreach($pokemons as $pkm)
                    <h1>{{ $pkm->name }}</h1>
                    <img src="{{ url('/public/uploads/'.$pkm->original_filename) }}" alt="{{ $pkm->name }}" style="max-width:120px;"/>
                @endforeach
            </div>
        </div>
    </body>
</html>
