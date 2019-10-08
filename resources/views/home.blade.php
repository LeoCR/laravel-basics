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
            <div class="col-lg-12">
                <a href="{{ url('/register-a-pokemon')}}" class="btn btn-primary">Register a Pokemon</a>
                <a href="{{ url('/register-a-trainer')}}" class="btn btn-success">Register a Trainer</a>
                <div class="col-md-4 float-left" style="border:1px solid black;">
                    <h1>Pokemons</h1>
                    @foreach($pokemons as $pkm)
                        <h4>{{ $pkm->name }}</h4>
                        <img src="{{ url('/public/uploads/'.$pkm->original_filename) }}" alt="{{ $pkm->name }}" style="max-width:120px;"/>
                    @endforeach
                </div>
                <div class="col-md-8 col-lg-6 float-right" style="border:1px solid gray;">
                    <h1>Trainers</h1>
                    @foreach($trainers as $trn)
                        <h4>{{ $trn->name }}</h4>
                        <a href="{{ url('/add-pokemon/'.$trn->id) }}" class="btn btn-warning">Add Pokemons</a>
                        <a href="{{ url('/view-pokemons/'.$trn->id) }}" class="btn btn-danger">View Pokemons</a>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
