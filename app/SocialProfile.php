<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class SocialProfile extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
