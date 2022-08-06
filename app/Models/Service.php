<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo('App\Models\Service','parent_id','id');
    }

    public function sub_services()
    {
        return $this->hasMany('App\Models\Service','parent_id');
    }

    public function sellers()
    {
        return $this->hasMany('App\Models\Seller');
    }
	
	/*public function getImageAttribute($value) {
		if($value != null){
			return url('public/uploads/images') . "/" . $value;
		}
	}*/

}
