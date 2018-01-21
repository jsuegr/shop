<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //relacion con cart_details
    public function details()
    {
    	return $this->hasMany(CartDetail::class);
    }
}
