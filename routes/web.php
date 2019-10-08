<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register-a-pokemon', function () {
    return view('register-pokemon');
});
Route::get('/register-a-trainer', function () {
    return view('register-a-trainer');
});
Route::get('/',[
    'uses'=>'PokemonController@getHome',
    'as'=>'home'
]);
Route::get('add-pokemon/{id}', 'PokemonTrainerController@getAddPokemonToTrainer');
Route::get('view-pokemons/{id}','PokemonTrainerController@getPokemons');
