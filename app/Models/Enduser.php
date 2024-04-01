<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Enduser extends Model
{

    protected $fillable = ['user_id','skype_id','date_of_birth', 'phone_number','whats_app',
        'address','gender',
        'default_pickup_location',
        'default_drop_location',
        'zip_code',
        'billing_address',
        'billing_postal_code',
        'billing_city',
        'billing_country',
        'vat_no'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @param $request
     */
    public function createUser($request){
        $this::create($request);
    }

    /**
     * @param $formData
     * @param $id
     */
    public function updateUserProfile($formData , $id){
        $formData['id'] = $id;
        $this::where('id' , $id)->update($formData);
    }

}
