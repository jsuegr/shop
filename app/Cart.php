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

    public function getTotalAttribute()
    {
    	$total = 0;
    	foreach ($this->details as $detail) {
    		$total += $detail->quantity*$detail->product->price;
    	}
    	return $total;
    }
}
