<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * @package App
 */
class Location extends Model
{
    protected $table ='locations';

    protected $fillable = ['default_location','is_top_city','location_lat','location_long','location_city','location_state','location_country','zip_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_location',
            'location_id', 'user_id');
    }


    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'location_vehicle',
            'location_id', 'vehicle_id')->withTimestamps();
    }

}
