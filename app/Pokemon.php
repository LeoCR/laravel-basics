<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public $timestamps = false;
    protected $table = 'pokemon';
    protected $fillable = ['name','filename','mime','original_filename'];
}