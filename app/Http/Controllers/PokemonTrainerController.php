<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Trainer;
use App\Pokemon;

class PokemonTrainerController extends Controller{

    public function getAddPokemonToTrainer($id){
        $trainer=Trainer::where('id',$id)->first();
        $pokemons=Pokemon::all();
        return view('add-pokemon-to-trainer',[
            'trainer'=>$trainer,
            'pokemons'=>$pokemons,
            'id'=>$id
        ]);
    }
    public function savePokemonTrainer(Request $request){
        $checkIfHasThisPokemon=false;
        if(isset($request->pokemon_name) && isset($request->trainer_name)
         && isset($request->id_trainer)){
            $pokemonId=DB::table('pokemon')->select('id')->where('name','=',$request->pokemon_name)->first();
            $hasThisPokemon=DB::select(DB::raw("SELECT * FROM pokemon_trainer WHERE pokemon_id=".$pokemonId->id." AND trainer_id=".$request->id_trainer." ;"));

            if($hasThisPokemon){
                $checkIfHasThisPokemon=true;
            }
            else{
                DB::table('pokemon_trainer')->insert([
                    ['trainer_id' => $request->id_trainer,'pokemon_id'=>$pokemonId->id]
                ]);
            }
            return response()->json([
                "hasThisPokemon"=>$checkIfHasThisPokemon,
                "pokemon_id"=>$pokemonId->id,
                "pokemon_name" => $request->pokemon_name,
                "trainer_name"=>$request->trainer_name,
                "id_trainer"=>$request->id_trainer
            ], 202);
        }
        else{
            return response()->json([
                "pokemon_name" =>null,
                "trainer_name"=>null,
                "id_trainer"=>null
            ], 202);
        }
    }
    public function getPokemons($id){
        $trainer=Trainer::find($id);
        return view('view-pokemons',[
            'trainer'=>$trainer,
            'id'=>$id
        ]);
    }
}
