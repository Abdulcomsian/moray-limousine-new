<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'map_api',
        'tax_rate',
        'paypal_account',
        'user_name',
        'paypal_key',
        'service_list_img',
        'service_detail_img',
        'our_fleet_img',
        'cancel_hour',
        'extend_hour_limit',
        'extra_column',//this is used for hours before user can book a ride
        'master_hour',   
    ];

}
