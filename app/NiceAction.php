<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiceAction extends Model
{
    /**
     * this migration was genereated with the command line:
     * php artisan make:model NiceAction -m
    */
    public function logged_actions(){
        return $this->hasMany('App\NiceActionLog');
    }
    public function categories(){
        return $this->belongsToMany('App\Category','categories_nice_actions');
    }
}
