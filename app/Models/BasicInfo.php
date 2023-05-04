<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicInfo extends Model
{
     protected $fillable = [
         'user_id',
         'on_behalf',
         'first_name',
         'last_name', 'gender', 'dob', 'marital_status',
         'religion', 'nationality',
         'cast',
         'self_description',
         ];
}
