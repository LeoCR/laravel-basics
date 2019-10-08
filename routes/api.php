<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 * run the next command line in the terminal to show all the routes availables :
 * php artisan route:list
 */
Route::resource('pokemon', 'PokemonController');
Route::resource('trainer', 'TrainerController');
Route::post('add-pokemon-to-trainer', 'PokemonTrainerController@savePokemonTrainer');
