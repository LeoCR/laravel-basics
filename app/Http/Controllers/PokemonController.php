<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Pokemon;

class PokemonController extends Controller{
    protected $pokemon;

    /**
     * @param Request $request
     * @param Product $user
     */
    public function __construct(Request $request, Pokemon $pokemon) {
        $this->request = $request;
        $this->pokemon = $pokemon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = $this->pokemon->all();
        return response()->json(['data' => $pokemon,
            'status' => Response::HTTP_OK]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //Instanciamos la clase Pokemons
            $pokemon = new Pokemon();
            //Declaramos el nombre con el nombre enviado en el request
            $pokemon->name = $request->name;
            //Guardamos el cambio en nuestro modelo
            $pokemon->save();
            return response()->json([
                "message" => "Pokemon created"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "error" => "An error occurs",
                "message"=>$th->getMessage()
            ], 200);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $pokemon = Pokemon::where('id', $id);
        if ($pokemon->exists()) {
            $data=$pokemon->get();
            return response()->json([
                "pokemon" => $data
              ], 202);
          } else {
            return response()->json([
              "message" => "Pokemon not found"
            ], 404);
          }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if (Pokemon::where('id', $id)->exists()) {
            $pokemon = Pokemon::find($id);
            $pokemon->name = is_null($request->name) ? $pokemon->name : $request->name;
            $pokemon->save();

            return response()->json([
                "message" => "Pokemon updated successfully",
                "pokemon"=>$pokemon
            ], 200);
            } else {
            return response()->json([
                "message" => "Pokemon not found"
            ], 404);

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(Pokemon::where('id', $id)->exists()) {
            $pokemon = Pokemon::find($id);
            $pokemon->delete();

            return response()->json([
              "message" => "Pokemon deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Pokemon not found"
            ], 404);
          }
    }
}
