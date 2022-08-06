<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function get_total_product()
    {
        return $this->hasMany('App\Models\Product')->count('id');
    }
}
