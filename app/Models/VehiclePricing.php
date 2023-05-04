<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VehiclePricing;

class VehiclePricing extends Model
{
    protected $table = 'vehiclepricing';

    protected $fillable = ['category_id', 'created_by', 'pricing_type', 'from', 'to', 'is_price_fixed', 'base_price', 'fixed_price'];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle','vehicle_id','id');
    }

    public function pricingBy()
    {
        if($this->pricing_type == 'DISTANCE')
        {
            return $this->belongsTo('App\Models\PricingByDistance','pricing_id','id');
        }else{
            return $this->belongsTo('App\Models\PricingByLocation','pricing_id','id');
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\VehicleCategory','category_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','created_by','id');
    }
}
