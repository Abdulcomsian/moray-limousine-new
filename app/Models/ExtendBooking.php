<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtendBooking extends Model
{

    protected $fillable = ['booking_id','previous_drop_location','new_drop_location','new_drop_lat',
        'new_drop_long','previous_net_amount','extended_amount','new_net_amount','payment_status'
    ,'extended_distance','extended_duration','tax_amount','grand_total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

