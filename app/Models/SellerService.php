<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerService extends Model
{
    use HasFactory;
    protected $table="sellerservices";
	
	 public function seller()
    {
        return $this->belongsTo('App\Models\Seller');
    }

	/*public function getImageAttribute($value) {
		if($value != null){
			return url('public/uploads/images') . "/" . $value;
		}
	}*/

}
