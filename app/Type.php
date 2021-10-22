<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function sizes()
    {
    	return $this->hasMany('App\Size');
    }
}
