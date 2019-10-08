<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerPokemon extends Model{
    public $timestamps = false;
    protected $table = 'pokemon_trainer';
    protected $fillable = [
        'trainer_id',
        'pokemon_id'
    ];
}
