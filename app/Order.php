<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function rules()
   	{
   		return $this->hasMany('App\Order_rule');
   	}
}
