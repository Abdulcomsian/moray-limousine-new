<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleCategory extends Model
{
    protected $fillable=[
        'name','picture','description','max_bags','max_seats',
        'price_per_km', 'price_per_hr', 'created_by','modified_by','is_public', 'long_description',
        'feature_1','feature_2', 'feature_3', 'feature_4', 'feature_5', 'feature_6', 'feature_heading',
    ];
    protected $table = 'vehiclecategory';


    /**
     * @return HasMany
     */
    public function vehicles(){
        return $this->hasMany('App\Models\Vehicle','vehicleCategory_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function options(){
        return $this->belongsToMany('App\Models\ExtraOptions' ,'optionscategories' ,'vehicleCategory_id','extraOption_id');
    }

    /**
     * @return HasMany
     */
    public function pricing(){
        return $this->hasMany('App\Models\VehiclePricing','category_id','id');
    }

    public function discount(){
        return $this->hasMany('App\Models\Discount','category_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function subtypes(){
        return $this->belongsToMany(VehicleSubtype::class, 'vehiclecategory_vehiclesubtype',
            'category_id', 'subtype_id');
    }

    /**
     * @return HasMany
     */
    public function bookings(){
        return $this->hasMany(Booking::class, 'vehicle_type_id');
    }

}
