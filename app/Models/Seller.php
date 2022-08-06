<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seller extends Model
{
    use HasFactory;


	public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function bank()
    {
        return $this->hasOne('App\Models\Bank');
    }

	/*public function getShopImageAttribute($value) {
		if($value != null){
			return url('public/uploads/shops') . "/" . $value;
		}
	}*/

}
