<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register a Trainer</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-6">
                <form method="post" action="{{url('/api/add-pokemon-to-trainer')}}">
                    {{ csrf_field() }}
                    <h2>{{ $trainer->name }}</h2>
                    <div class="form-group">
                        <input type="hidden" name="id_trainer" value="{{$id}}">
                        <input type="hidden" name="trainer_name" value="{{$trainer->name}}">
                        <label for="pokemon-name">Pokemon</label>
                        <select id="pokemon-name" name="pokemon_name">
                            <option value="select" selected >Select a Pokemon</option>
                            @foreach($pokemons as $pkm)
                                <option>{{ $pkm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </body>
</html>
