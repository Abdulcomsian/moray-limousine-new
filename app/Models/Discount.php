<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['category_id','start_date','end_date','start_time','end_time',
        'discount_rate','price_up_rate'];


    public function category(){
        return $this->belongsTo(VehicleCategory::class,'category_id','id');
    }

}
