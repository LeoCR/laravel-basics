<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model{
    public $timestamps = false;
    protected $table = 'trainer';
    protected $fillable = [
        'name'
    ];
    public function pokemons(){
        return $this->belongsToMany(Pokemon::class, 'pokemon_trainer');
    }
}
