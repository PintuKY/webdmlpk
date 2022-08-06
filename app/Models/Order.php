<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function order_lists()
    {
        return $this->hasMany('App\Models\OrderList');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\Seller');
    }
	
	public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
