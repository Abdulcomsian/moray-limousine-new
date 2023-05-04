<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedOption extends Model
{
   protected $table = 'selectedoptions';
   protected $fillable = ['booking_id', 'option_name','quantity','price','option_id'];

   public function booking(){
       return $this->belongsTo(Booking::class);
   }



}
