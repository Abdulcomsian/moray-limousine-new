<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicletype';

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle','type_id','id')->where('status','APPROVED');
    }
}
